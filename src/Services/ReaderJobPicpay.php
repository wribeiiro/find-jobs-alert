<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\ValueObjects\Job;
use App\Entities\PicpayJobType;

class ReaderJobPicpay extends AbstractReader
{
    const PERIOD = 'Full-time';
    const AREA = 'Tecnologia';

    public function __construct(
        private $picpayJob = new PicpayJobType()
    ) {

    }

    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', $this->picpayJob->getEndpoint());

        return $crawler->filter($this->picpayJob->getElementToFind())->each(function($html) {
            return new Job(
                $html->children('td')->children('a.job-list__item > h4 > span.title')->text(),
                $html->filter('td')->eq(1)->text(),
                $html->filter('td')->eq(2)->text(),
                'Tecnologia',
                $this->picpayJob->getEndpoint(). $html->children('td')->children('a.job-list__item')->attr('href')
            );
        });
    }
}