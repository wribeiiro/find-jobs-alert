<?php

namespace App\Entities;

class Job
{
    private string $jobName;
    private string $local;
    private string $period;
    private string $area;
    private string $link;

    /**
     * Get the value of link
     */ 
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @return  self
     */ 
    public function setLink($link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get the value of area
     */ 
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * Set the value of area
     *
     * @return  self
     */ 
    public function setArea($area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of period
     */ 
    public function getPeriod(): string
    {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @return  self
     */ 
    public function setPeriod($period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of jobName
     */ 
    public function getJobName(): string
    {
        return $this->jobName;
    }

    /**
     * Set the value of jobName
     *
     * @return  self
     */ 
    public function setJobName($jobName): self
    {
        $this->jobName = $jobName;

        return $this;
    }

    /**
     * Get the value of local
     */ 
    public function getLocal(): string
    {
        return $this->local;
    }

    /**
     * Set the value of local
     *
     * @return  self
     */ 
    public function setLocal($local): self
    {
        $this->local = $local;

        return $this;
    }
}