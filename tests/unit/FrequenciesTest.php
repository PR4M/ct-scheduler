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
        $frequencies = $this->getMockForTrait(Frequencies::class);
        $frequencies->expression = '* * * * *';
        $frequencies->cron('an expression');

        $this->assertEquals($frequencies->expression, 'an expression');
    }
}