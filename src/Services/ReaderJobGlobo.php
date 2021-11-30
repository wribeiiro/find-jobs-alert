<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\Entities\Job;
use App\Enums\GloboJobs;

class ReaderJobGlobo extends AbstractReader
{   
    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', GloboJobs::ENDPOINT);
        
        return $crawler->filter(GloboJobs::ELEMENT_SEARCH)->each(function($html) {
            $job = new Job();
        
            $job->setJobName($html->children('a')->children('div.row > div.col-md-6 > h3.cut-text')->text())
                ->setLocal(
                    $html->children('a')->children('div.row > div.col-md-6 > div > span:first-child')->text() . ', ' . 
                    $html->children('a')->children('div.row > div.col-md-6 > div > span:last-child')->text()
                )
                ->setPeriod(
                    $html->children('a')->children('div.row > div.col-md-4 > div > span:first-child')->text() . ' | ' . 
                    $html->children('a')->children('div.row > div.col-md-4 > div > span:last-child')->text()
                )
                ->setArea($html->children('a')->children('div.row > div.col-md-4 > div:first-child')->text())
                ->setLink(GloboJobs::ENDPOINT . $html->children('a')->attr('href'));
            
            return $job;
        });
    }
}