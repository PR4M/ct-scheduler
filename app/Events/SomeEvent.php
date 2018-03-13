<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/12/2018
 * Time: 7:04 PM
 */

namespace App\Events;


use App\Scheduler\Event;

class SomeEvent extends Event
{
    public function handle()
    {
        var_dump($this->expression);
    }
}