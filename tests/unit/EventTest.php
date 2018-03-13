<?php
/**
 * Created by PhpStorm.
 * User: Pramana
 * Date: 3/12/2018
 * Time: 6:36 PM
 */

use Carbon\Carbon;
use CT\Scheduler\Event;

class EventTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function event_has_default_cron_expression()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertEquals($event->expression, '* * * * *');
    }

    /** @test */
    public function event_should_be_run()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertTrue($event->isDueToRun(Carbon::now()));
    }

    /** @test */
    public function event_should_not_be_run()
    {
        $event = $this->getMockForAbstractClass(Event::class);
        $event->expression = '0 0 1 * *';

        $this->assertFalse($event->isDueToRun(Carbon::now()));
    }
}