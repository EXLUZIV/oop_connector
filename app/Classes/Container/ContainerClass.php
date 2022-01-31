<?php

namespace App\Container;

use App\Container\ContainerInterface;
use App\Container\Exception\DependecyHasNotDefaultValueException;
use App\Container\Exception\DependecyIsNotInstantiableException;
use Reflection;
use ReflectionClass;

class ContainerClass implements ContainerInterface
{

	private array $instance = [];

	public function set($id, $concrete = null)
	{
		if ($concrete === null) {
			$concrete = $id;
		}

		$this->instance[$id] = $concrete;
	}

	public function has($id)
	{
		return isset($this->instance[$id]);
	}

	public function get($id)
	{
		if (!$this->has($id)) {
			$this->set($id);
		}
		$concrete = $this->instance[$id];
		return $this->resolve($concrete);
	}

	private function resolve($concrete)
	{
		$reflection = new ReflectionClass($concrete);
		if (!$reflection->isInstantiable()) {
			throw new DependecyIsNotInstantiableException(
				"Class {$concrete} is not instantiable."
			);
		}

		$constructor = $reflection->getConstructor();
		
		if (is_null($constructor)) {
			return $reflection->newInstance();
		}

		$parameters = $constructor->getParameters();

		$dependencies = $this->getDependecies($parameters, $reflection);
		return $reflection->newInstanceArgs($dependencies);
	}

	private function getDependecies($parameters, $reflection)
	{
		$dependencies = [];
		foreach ($parameters as $parameter) {
			$dependency = $parameter->getClass();
			if (is_null($dependency)) {
				if ($parameter->isDefaultValueAvailable()) {
					$dependencies[] = $parameter->hetDefaultValue();
				} else {
					throw new DependecyHasNotDefaultValueException('Sorry can not resolve class dependecy ' . $parameter->name);
				}
			} else {
				$dependencies[] = $this->get($dependency->name);

			}
		}

		return $dependencies;
	}
}