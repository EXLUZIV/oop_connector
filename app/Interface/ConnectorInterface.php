<?php

namespace App\Interface;

interface ConnectorInterface
{
	public function ConectBD();
	public function getConfigbyKey(string $key): string;
}