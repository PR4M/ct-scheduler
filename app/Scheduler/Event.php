<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 3/12/2018
 * Time: 6:49 PM
 */

namespace App\Scheduler;


abstract class Event
{
    public $expression = '* * * * *';

    abstract public function handle();
}