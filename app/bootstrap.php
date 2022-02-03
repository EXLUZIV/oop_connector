<?php

use App\Classes\AutoloadClass;
use App\Seeder\SeederClass;

require('app/Classes/Main/AutoloadClass.php');

AutoloadClass::autoload();

require('app/migration.php');

// SeederClass::up();
require('app/routerConfig.php');