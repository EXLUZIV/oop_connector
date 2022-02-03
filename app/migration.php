<?php

use App\Classes\ConfigBDClass;
use App\Classes\CreateComentTableClass;
use App\Classes\CreatePostTableClass;
use App\Classes\CreateUserTableClass;

$connectBD = new ConfigBDClass('config.php');


$tb = new CreateUserTableClass($connectBD);
$tb->createTable('worker');
$tb1 = new CreatePostTableClass($connectBD);
$tb1->createTable('post_by_worker');
$tb2 = new CreateComentTableClass($connectBD);
$tb2->createTable('coment_by_worker');

