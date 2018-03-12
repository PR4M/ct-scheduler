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
        $this->expression = '* * * * *';

        return $this;
    }

    public function everyTenMinutes()
    {
        $this->expression = '*/10 * * * *';

        return $this;
    }

    public function everyThirtyMinutes()
    {
        $this->expression = '*/30 * * * *';

        return $this;
    }

    public function replaceIntoExpression($position, $value)
    {
        $value = (array)$value;

        $expression = explode(' ', $this->expression);
        array_splice($expression, $position - 1, 1, $value);

        return $this->cron(implode(' ', $expression));
    }
}