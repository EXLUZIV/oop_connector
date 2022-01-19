<?php

use App\Classes\ConfigBDClass;
use App\Classes\ConnectorClass;
use App\Classes\CreateTableClass;
use App\Classes\CreateInformationClass;

require_once('Autoload.php');

$bd1 = new CreateTableClass(new ConnectorClass(new ConfigBDClass('config.php')));
$bd1->createTable('uber');

$bd = new CreateInformationClass(new ConnectorClass(new ConfigBDClass('config.php')));
echo '<br>';
$bd->configUser('uber', 'Alex', 'my password', 'Alex@gmail.com');
$bd->addUser();
$bd->configUser('uber', 'Vadim', '5556666', 'Vadim@gmail.com');
$bd->addUser();
$bd->configUser('uber', 'Dima', '123321', 'Dima@gmail.com');
$bd->addUser();
echo $bd->getUserByEmail('Dima@gmail.com');
echo '<br>';
echo $bd->getUserByEmail('Vadim@gmail.com');