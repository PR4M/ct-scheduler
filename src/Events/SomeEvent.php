<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/12/2018
 * Time: 7:04 PM
 */

namespace CT\Events;


use CT\Scheduler\Event;

class SomeEvent extends Event
{
    public function handle()
    {
        var_dump($this->expression);
    }
}