<?php

use App\Classes\AutoloadClass;
use App\Classes\CreateComentClass;
use App\Classes\CreatePostClass;
use App\Classes\CreateUserClass;
use App\Classes\JoinAllClass;
use App\Classes\SeederClass;

require('app/Classes/Main/AutoloadClass.php');

AutoloadClass::autoload();

require('app/migration.php');

SeederClass::up();