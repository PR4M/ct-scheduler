<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 3/12/2018
 * Time: 10:02 PM
 */

namespace App\Scheduler;


trait Frequencies
{
    public function cron($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    public function everyMinute()
    {
        return $this->cron($this->expression);
    }

    public function everyTenMinutes()
    {
        return $this->replaceIntoExpression(1, '*/10');
    }

    public function everyThirtyMinutes()
    {
        return $this->replaceIntoExpression(1, '*/30');
    }

    public function hourlyAt($minute = 1)
    {
        return $this->replaceIntoExpression(1, $minute);
    }

    public function hourly()
    {
        return $this->hourlyAt(1);
    }

    public function dailyAt($hour = 0, $minute = 0)
    {
        return $this->replaceIntoExpression(1, [$minute, $hour]);
    }

    public function daily()
    {
        return $this->dailyAt(0, 0);
    }

    public function replaceIntoExpression($position, $value)
    {
        $value = (array)$value;

        $expression = explode(' ', $this->expression);
        array_splice($expression, $position - 1, 1, $value);
        $expression = array_slice($expression, 0, 5);

        return $this->cron(implode(' ', $expression));
    }
}