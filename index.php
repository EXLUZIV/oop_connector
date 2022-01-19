<?php

use App\Classes\ConnectorClass;
use App\Classes\CreateTableClass;
use App\Classes\CustomClassBD;

require_once('Autoload.php');

$bd1 = new CreateTableClass(new ConnectorClass);
$bd1->createTable('taxi_worker');

$bd = new CustomClassBD(new ConnectorClass);
echo $bd->getConfigbyKey('bd');
echo '<br>';
$bd->configUser('taxi_worker', 'Alex', 'my password', 'Alex@gmail.com');
$bd->addUser();
$bd->configUser('taxi_worker', 'Vadim', '5556666', 'Vadim@gmail.com');
$bd->addUser();
$bd->configUser('taxi_worker', 'Dima', '123321', 'Dima@gmail.com');
$bd->addUser();
echo $bd->getUserByEmail('Dima@gmail.com');
echo $bd->getUserByEmail('Vadim@gmail.com');