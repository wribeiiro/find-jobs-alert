<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

use App\ValueObjects\Job;
use App\Enums\PagarmeJobs;

class ReaderJobPagarme extends AbstractReader
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
        $crawler = $browser->request('GET', PagarmeJobs::Endpoint->value);

        return $crawler->filter(PagarmeJobs::Element->value)->each(function($html) {
            return new Job(
                $html->children('div')->children('a')->text(),
                $html->children('div')->children('span.location')->text(),
                self::PERIOD,
                self::AREA,
                PagarmeJobs::Endpoint->value . $html->children('div')->children('a')->attr('href')
            );
        });
    }
}