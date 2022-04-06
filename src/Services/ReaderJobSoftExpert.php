<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\ValueObjects\Job;
use App\Enums\SoftExpertJobs;

class ReaderJobSoftExpert extends AbstractReader
{
    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', SoftExpertJobs::Endpoint->value);

        return $crawler->filter(SoftExpertJobs::Element->value)->each(function($html) {
            return new Job(
                $html->children('a')->children('div.row > div.col-md-6 > h3.cut-text')->text(),
                $html->children('a')->children('div.row > div.col-md-6 > div > span:first-child')->text() . ', ' .
                $html->children('a')->children('div.row > div.col-md-6 > div > span:last-child')->text(),
                $html->children('a')->children('div.row > div.col-md-4 > div > span:first-child')->text() . ' | ' .
                $html->children('a')->children('div.row > div.col-md-4 > div > span:last-child')->text(),
                $html->children('a')->children('div.row > div.col-md-4 > div:first-child')->text(),
                SoftExpertJobs::Endpoint->value . $html->children('a')->attr('href')
            );
        });
    }
}