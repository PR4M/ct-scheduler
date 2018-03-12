<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 3/12/2018
 * Time: 10:02 PM
 */

namespace App\Scheduler;


trait Frequencies
{
    public function cron($expression)
    {
        $this->expression = $expression;
    }

    public function everyMinute()
    {
        $this->expression = '* * * * *';
    }

    public function everyTenMinutes()
    {
        $this->expression = '*/10 * * * *';
    }

    public function everyThirtyMinutes()
    {
        $this->expression = '*/30 * * * *';
    }
}