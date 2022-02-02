<?php

use App\Classes\AutoloadClass;
use App\Classes\PostClass;
use App\Classes\SeederClass;

require('app/Classes/Main/AutoloadClass.php');

AutoloadClass::autoload();

require('app/migration.php');


// SeederClass::up();

$post = new PostClass($connectBD);
$post->getPost();