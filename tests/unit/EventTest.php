<?php
/**
 * Created by PhpStorm.
 * User: Pramana
 * Date: 3/12/2018
 * Time: 6:36 PM
 */

use App\Scheduler\Event;

class EventTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function event_has_default_cron_expression()
    {
        $event = $this->getMockForAbstractClass(Event::class);

        $this->assertEquals($event->expression, '* * * * *');
    }
}