<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\Entities\Job;
use App\Enums\PicpayJobs;

class ReaderJobPicpay extends AbstractReader
{   
    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', PicpayJobs::ENDPOINT);
        
        return $crawler->filter(PicpayJobs::ELEMENT_SEARCH)->each(function($html) {
            $job = new Job();
            
            $job->setJobName($html->children('td')->children('a.job-list__item > h4 > span.title')->text())            
                ->setLocal($html->filter('td')->eq(1)->text())
                ->setPeriod($html->filter('td')->eq(2)->text())
                ->setArea('Tecnologia')
                ->setLink(PicpayJobs::ENDPOINT . $html->children('td')->children('a.job-list__item')->attr('href'));

            return $job;
        });
    }
}