<?php

namespace App\Container\Exception;

use App\Container\NotFoundExceptionInterface;
use Exception;

class DependecyHasNotDefaultValueException extends Exception implements NotFoundExceptionInterface
{}