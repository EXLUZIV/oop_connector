<?php

use App\Classes\AutoloadClass;
use App\Classes\CreateComentClass;
use App\Classes\CreateInformationClass;
use App\Classes\CreatePostClass;

require('app/Classes/Main/AutoloadClass.php');

AutoloadClass::autoload();

require('app/migration.php');


$user = new CreateInformationClass($inj);
$user->configUser('worker', 'Alex', 'secret pass', 'alex@gmail.com');
$user->addUser();

$post = new CreatePostClass($inj);
$post->configPost('post_by_worker', 'First post by Alex');
$post->addPost();

$coment = new CreateComentClass($inj);
$coment->configComent('coment_by_worker', 'First coment by Alex');
$coment->addComent();