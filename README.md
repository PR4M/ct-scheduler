# PHP Task/Cron Scheduler

A set of code to help you run any cron jobs or task scheduler that can be easily integrated in your project, or run it as a standalone command scheduler. 

## How to Use

After pulling from composer or download it from the repo, create a `scheduler.php` file in your project directory as follows: 

**scheduler.php**

```php
<?php require_once __DIR__.'/vendor/autoload.php';

use CT\Scheduler\Kernel;
use YourProject/YourEvent; // more details below

// create your own kernel to run task/cron
$scheduler = new Kernel;

// choose or set any schedule for your kernel
$scheduler->add(new YourEvent())->daily(); // set to run task on daily basis

// let the scheduler run on its schedule that has been set
$scheduler->run();
```

**YourEvent.php**

Create or have any events that you want inside YourProject directory, but be sure to extend Event class from `CT\Scheduler\Event;`.  And should be implement `handle()` method. 

```php
use CT\Scheduler\Event;

class YourEvent extends Event
{
   public function handle()
	{
    	// your event code here..
	} 
}
```

## Units of Time

There are units of time that you can use to run tasks on your chosen basis. 

- `everyMinute`
- `everyTenMinutes`
- `everyThirtyMinutes`
- `hourlyAt`
- `hourly`
- `dailyAt`
- `daily`
- `twiceDaily`
- `monday` 
- `tuesday`
- `wednesday`
- `thursday`
- `friday`
- `saturday`
- `sunday`
- `weekdays`
- `weekends`
- `monthly`
- `monthlyOn`
- `at`

### Examples:

Run on every Friday.

```php
$scheduler->add(new YourEvent())->friday();
```

Run only on Workdays.

```php
$scheduler->add(new YourEvent())->weekdays(); // Run on Monday, Tuesday, Wednesday, Thursday, Friday
```

Run only on Weekends.

```php
$scheduler->add(new YourEvent())->weekdays(); // Run on Saturday and Sunday
```

Run Every Minute on Friday

```php
$scheduler->add(new YourEvent())->friday()->everyMinute(); // Run on Friday, and every minute
```



## License

`see LICENSE.MD` 
Licensed as [MIT License (MIT)]

