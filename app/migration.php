<?php

use App\Classes\AutoloadClass;
use App\Classes\ConfigBDClass;
use App\Classes\CreateComentTableClass;
use App\Classes\CreatePostTableClass;
use App\Classes\CreateUserTableClass;

$inj = new ConfigBDClass('config.php');

$tb = new CreateUserTableClass($inj);
$tb->createTable('worker');
$tb1 = new CreatePostTableClass($inj);
$tb1->createTable('post_by_worker');
$tb2 = new CreateComentTableClass($inj);
$tb2->createTable('coment_by_worker');