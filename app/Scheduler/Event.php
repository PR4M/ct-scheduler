<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 3/12/2018
 * Time: 6:49 PM
 */

namespace App\Scheduler;

use Carbon\Carbon;
use Cron\CronExpression;

abstract class Event
{
    public $expression = '* * * * *';

    abstract public function handle();

    public function isDueToRun(Carbon $date)
    {
        return CronExpression::factory($this->expression)->isDue($date);
    }
}