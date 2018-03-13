<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/12/2018
 * Time: 6:45 PM
 */

namespace CT;

use CT\Scheduler\Kernel;
use CT\Events\SomeEvent;

require_once 'vendor/autoload.php';

$kernel = new Kernel;

$kernel->add(new SomeEvent())->daily();

$kernel->run();

