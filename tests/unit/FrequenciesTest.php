<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/12/2018
 * Time: 10:04 PM
 */

use App\Scheduler\Frequencies;

class FrequenciesTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function able_set_plain_cron_expression()
    {
        $frequencies = $this->frequencies();
        $frequencies->cron('an expression');

        $this->assertEquals($frequencies->expression, 'an expression');
    }

    /** @test */
    public function able_set_every_minute()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyMinute();

        $this->assertEquals($frequencies->expression, '* * * * *');
    }

    /** @test */
    public function able_set_every_ten_minutes()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyTenMinutes();

        $this->assertEquals($frequencies->expression, '*/10 * * * *');
    }

    /** @test */
    public function able_set_every_thirty_minutes()
    {
        $frequencies = $this->frequencies();
        $frequencies->everyThirtyMinutes();

        $this->assertEquals($frequencies->expression, '*/30 * * * *');
    }

    protected function frequencies()
    {
        $frequencies = $this->getMockForTrait(Frequencies::class);
        $frequencies->expression = '* * * * *';

        return $frequencies;
    }
}