<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\ValueObjects\Job;
use App\Enums\PicpayJobs;

class ReaderJobPicpay extends AbstractReader
{
    const PERIOD = 'Full-time';
    const AREA = 'Tecnologia';
    /**
     * Get the array of jobs
     *
     * @return Job[]
     */
    public function readJobs(): array
    {
        $browser = new HttpBrowser(HttpClient::create());
        $crawler = $browser->request('GET', PicpayJobs::Endpoint->value);

        return $crawler->filter(PicpayJobs::Element->value)->each(function($html) {
            return new Job(
                $html->children('td')->children('a.job-list__item > h4 > span.title')->text(),
                $html->filter('td')->eq(1)->text(),
                $html->filter('td')->eq(2)->text(),
                'Tecnologia',
                PicpayJobs::Endpoint->value . $html->children('td')->children('a.job-list__item')->attr('href')
            );
        });
    }
}