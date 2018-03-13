<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 8:42 AM
 */

namespace App\Scheduler;


class Kernel
{
    protected $events = [];

    public function getEvents()
    {
        return $this->events;
    }

    public function add(Event $event)
    {
        $this->events[] = $event;
    }
}