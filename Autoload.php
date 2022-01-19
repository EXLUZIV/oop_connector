<?php

spl_autoload_register(function ($class) {

	$prefix = 'App\\Classes\\';
	$base_dir = __DIR__ . '/app/Classes/Main/';

	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {

		 return;
	}
	$relative_class = substr($class, $len);

	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	if (file_exists($file)) {
		 require $file;
	}
});

spl_autoload_register(function ($class) {

	$prefix = 'App\\Classes\\';
	$base_dir = __DIR__ . '/app/Classes/Migration/';

	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {

		 return;
	}
	$relative_class = substr($class, $len);

	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	if (file_exists($file)) {
		 require $file;
	}
});

spl_autoload_register(function ($interface) {

	$prefix = 'App\\Interface\\';
	$base_dir = __DIR__ . '/app/Interface/';

	$len = strlen($prefix);
	if (strncmp($prefix, $interface, $len) !== 0) {

		 return;
	}
	$relative_class = substr($interface, $len);

	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	if (file_exists($file)) {
		 require $file;
	}
});