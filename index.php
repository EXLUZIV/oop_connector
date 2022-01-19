<?php

use App\Classes\ConfigBDClass;
use App\Classes\ConnectorClass;
use App\Classes\CreateTableClass;
use App\Classes\CreateInformationClass;

require_once('Autoload.php');

$bd1 = new CreateTableClass(new ConnectorClass(new ConfigBDClass));
$bd1->createTable('taxi_worker');

$bd = new CreateInformationClass(new ConnectorClass(new ConfigBDClass));
echo '<br>';
$bd->configUser('taxi_worker', 'Alex', 'my password', 'Alex@gmail.com');
$bd->addUser();
$bd->configUser('taxi_worker', 'Vadim', '5556666', 'Vadim@gmail.com');
$bd->addUser();
$bd->configUser('taxi_worker', 'Dima', '123321', 'Dima@gmail.com');
$bd->addUser();
echo $bd->getUserByEmail('Dima@gmail.com');
echo '<br>';
echo $bd->getUserByEmail('Vadim@gmail.com');