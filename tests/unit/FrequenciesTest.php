<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/12/2018
 * Time: 10:04 PM
 */

use CT\Scheduler\Frequencies;

class FrequenciesTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function able_replace_into_expression_at_position()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, 1);

        $this->assertEquals($frequencies->expression, '1 * * * *');
    }

    /** @test */
    public function able_replace_into_expression_by_chaining()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, 1)->replaceIntoExpression(2, 2);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }

    /** @test */
    public function able_replace_into_expression_with_array()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(1, [1, 2]);

        $this->assertEquals($frequencies->expression, '1 2 * * *');
    }

    /** @test */
    public function able_replace_past_the_end_of_an_expression()
    {
        $frequencies = $this->frequencies();
        $frequencies->replaceIntoExpression(5, [1, 2]);

        $this->assertEquals($frequencies->expression, '* * * * 1');
    }

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

    /** @test */
    public function able_set_hourly_at()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourlyAt(45);

        $this->assertEquals($frequencies->expression, '45 * * * *');
    }

    /** @test */
    public function able_set_hourly()
    {
        $frequencies = $this->frequencies();
        $frequencies->hourly(45);

        $this->assertEquals($frequencies->expression, '1 * * * *');
    }

    /** @test */
    public function able_set_daily_at()
    {
        $frequencies = $this->frequencies();
        $frequencies->dailyAt(12, 44);

        $this->assertEquals($frequencies->expression, '44 12 * * *');
    }

    /** @test */
    public function able_set_daily()
    {
        $frequencies = $this->frequencies();
        $frequencies->daily();

        $this->assertEquals($frequencies->expression, '0 0 * * *');
    }

    /** @test */
    public function able_set_twice_daily()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily(4, 12);

        $this->assertEquals($frequencies->expression, '0 4,12 * * *');
    }

    /** @test */
    public function able_set_twice_daily_using_default()
    {
        $frequencies = $this->frequencies();
        $frequencies->twiceDaily();

        $this->assertEquals($frequencies->expression, '0 1,12 * * *');
    }

    /** @test */
    public function able_set_days()
    {
        $frequencies = $this->frequencies();
        $frequencies->days(1, 3, 5);

        $this->assertEquals($frequencies->expression, '* * * * 1,3,5');
    }

    /** @test */
    public function able_set_monday()
    {
        $frequencies = $this->frequencies();
        $frequencies->monday();

        $this->assertEquals($frequencies->expression, '* * * * 1');
    }

    /** @test */
    public function able_set_tuesday()
    {
        $frequencies = $this->frequencies();
        $frequencies->tuesday();

        $this->assertEquals($frequencies->expression, '* * * * 2');
    }

    /** @test */
    public function able_set_wednesday()
    {
        $frequencies = $this->frequencies();
        $frequencies->wednesday();

        $this->assertEquals($frequencies->expression, '* * * * 3');
    }

    /** @test */
    public function able_set_thursday()
    {
        $frequencies = $this->frequencies();
        $frequencies->thursday();

        $this->assertEquals($frequencies->expression, '* * * * 4');
    }

    /** @test */
    public function able_set_friday()
    {
        $frequencies = $this->frequencies();
        $frequencies->friday();

        $this->assertEquals($frequencies->expression, '* * * * 5');
    }

    /** @test */
    public function able_set_saturday()
    {
        $frequencies = $this->frequencies();
        $frequencies->saturday();

        $this->assertEquals($frequencies->expression, '* * * * 6');
    }

    /** @test */
    public function able_set_sunday()
    {
        $frequencies = $this->frequencies();
        $frequencies->sunday();

        $this->assertEquals($frequencies->expression, '* * * * 7');
    }

    /** @test */
    public function able_set_weekdays()
    {
        $frequencies = $this->frequencies();
        $frequencies->weekdays();

        $this->assertEquals($frequencies->expression, '* * * * 1,2,3,4,5');
    }

    /** @test */
    public function able_set_weekends()
    {
        $frequencies = $this->frequencies();
        $frequencies->weekends();

        $this->assertEquals($frequencies->expression, '* * * * 6,7');
    }

    /** @test */
    public function able_set_at_time()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30);

        $this->assertEquals($frequencies->expression, '30 12 * * *');
    }

    /** @test */
    public function able_set_day_and_time()
    {
        $frequencies = $this->frequencies();
        $frequencies->at(12, 30)->weekends();

        $this->assertEquals($frequencies->expression, '30 12 * * 6,7');
    }

    /** @test */
    public function able_set_monthly()
    {
        $frequencies = $this->frequencies();
        $frequencies->monthly();

        $this->assertEquals($frequencies->expression, '0 0 1 * *');
    }

    /** @test */
    public function able_set_monthly_on_specific_day()
    {
        $frequencies = $this->frequencies();
        $frequencies->monthlyOn(10);

        $this->assertEquals($frequencies->expression, '0 0 10 * *');
    }

    /** @test */
    public function replacement_works_correctly()
    {
        $frequencies = $this->frequencies();
        $frequencies->daily()->daily();

        $this->assertEquals($frequencies->expression, '0 0 * * *');
    }

    protected function frequencies()
    {
        $frequencies = $this->getMockForTrait(Frequencies::class);
        $frequencies->expression = '* * * * *';

        return $frequencies;
    }
}