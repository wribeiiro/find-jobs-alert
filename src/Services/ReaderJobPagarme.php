<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\Entities\Job;
use App\Enums\PagarmeJobs;

class ReaderJobPagarme extends AbstractReader
{   
    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', PagarmeJobs::ENDPOINT);
        
        return $crawler->filter(PagarmeJobs::ELEMENT_SEARCH)->each(function($html) {
            $job = new Job();
        
            $job->setJobName($html->children('div')->children('a')->text())            
                ->setLocal($html->children('div')->children('span.location')->text())
                ->setPeriod('Full-time')
                ->setArea('Tecnologia')
                ->setLink(PagarmeJobs::ENDPOINT . $html->children('div')->children('a')->attr('href'));
            
            return $job;
        });
    }
}