<?php

declare(strict_types=1);

namespace App\Container;

interface ContainerInterface
{
	public function get($id);
	public function has($id);
}