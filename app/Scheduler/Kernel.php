<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 8:42 AM
 */

namespace App\Scheduler;


use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;

class Kernel
{
    protected $events = [];

    protected $date;

    public function getEvents()
    {
        return $this->events;
    }

    public function add(Event $event)
    {
        $this->events[] = $event;
    }

    public function setDate(Carbon $date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        if(!$this->date) {
            return Carbon::now();
        }
        
        return $this->date;
    }
}