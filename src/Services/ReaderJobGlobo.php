<?php

namespace App\Services;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\ValueObjects\Job;
use App\Entities\GloboJobType;

class ReaderJobGlobo extends AbstractReader
{
    public function __construct(
        private $globoJob = new GloboJobType()
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
        $crawler = $browser->request('GET', $this->globoJob->getEndpoint());

        return $crawler->filter($this->globoJob->getElementToFind())->each(function($html) {
            return new Job(
                $html->children('a')->children('div.row > div.col-md-6 > h3.cut-text')->text(),
                $html->children('a')->children('div.row > div.col-md-6 > div > span:first-child')->text() . ', ' .
                $html->children('a')->children('div.row > div.col-md-6 > div > span:last-child')->text(),
                $html->children('a')->children('div.row > div.col-md-4 > div > span:first-child')->text() . ' | ' .
                $html->children('a')->children('div.row > div.col-md-4 > div > span:last-child')->text(),
                $html->children('a')->children('div.row > div.col-md-4 > div:first-child')->text(),
                $this->globoJob->getEndpoint() . $html->children('a')->attr('href')
            );
        });
    }
}