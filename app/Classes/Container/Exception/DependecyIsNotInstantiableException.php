<?php

namespace App\Container\Exception;

use App\Container\NotFoundExceptionInterface;
use Exception;

class DependecyIsNotInstantiableException extends Exception implements NotFoundExceptionInterface
{}