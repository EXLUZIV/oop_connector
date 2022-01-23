<?php

use App\Classes\AutoloadClass;
use App\Classes\CreateComentClass;
use App\Classes\CreatePostClass;
use App\Classes\CreateUserClass;
use App\Classes\JoinAllClass;

require('app/Classes/Main/AutoloadClass.php');

AutoloadClass::autoload();

require('app/migration.php');


$user = new CreateUserClass($inj);
$user->configUser('worker', 'Alex', 'secret pass', 'alex@gmail.com');
$user->addUser();



$post = new CreatePostClass($inj);
$post->configPost('post_by_worker', '1', 'first post by alex');
$post->addPost();

$coment = new CreateComentClass($inj);
$coment->configComent('coment_by_worker', '1' , '1' , 'first coment by alex');
$coment->addComent();

$join = new JoinAllClass($inj);
$join->joinTable('worker', 'post_by_worker', 'coment_by_worker');