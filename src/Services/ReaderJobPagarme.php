<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\ValueObjects\Job;
use App\Entities\PagarmeJobType;

class ReaderJobPagarme extends AbstractReader
{
    const PERIOD = 'Full-time';
    const AREA = 'Tecnologia';

    public function __construct(
        private $pagarMeJob = new PagarmeJobType()
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
        $crawler = $browser->request('GET', $this->pagarMeJob->getEndpoint());

        return $crawler->filter($this->pagarMeJob->getElementToFind())->each(function($html) {
            return new Job(
                $html->children('div')->children('a')->text(),
                $html->children('div')->children('span.location')->text(),
                self::PERIOD,
                self::AREA,
                $this->pagarMeJob->getEndpoint() . $html->children('div')->children('a')->attr('href')
            );
        });
    }
}