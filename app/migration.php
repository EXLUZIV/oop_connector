<?php

use App\Classes\ConfigBDClass;
use App\Classes\CreateComentTableClass;
use App\Classes\CreatePostTableClass;
use App\Classes\CreateUserTableClass;
use App\Container\ContainerClass;

// $connectBD = new ConfigBDClass('config.php');

$container = new ContainerClass();

// $connectBD = $container->get();
// $connectBD->setFile()->set('config.php');
// die();

// $connectBD = $container->get(ConfigBDClass::class);
// $connectBD->setFile()->set('config.php');
// die();

$tb = $container->get(ConfigBDClass::class);
$tb->bdconfig()->set('config.php');
$tb->createTable('worker');

die();

// $tb = new CreateUserTableClass($connectBD);
// $tb->createTable('worker');
$tb1 = new CreatePostTableClass($connectBD);
$tb1->createTable('post_by_worker');
$tb2 = new CreateComentTableClass($connectBD);
$tb2->createTable('coment_by_worker');