<?php //netteCache[01]000209a:2:{s:4:"time";s:21:"0.96969500 1310660060";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:39:"C:\xampp\htdocs\sandbox\app/config.neon";i:2;i:1309574172;}}}?><?php
// source file C:\xampp\htdocs\sandbox\app/config.neon

$container->addService('robotLoader', function($container) {
	$service = call_user_func(
		array ( 0 => 'Nette\\Configurator', 1 => 'createServicerobotLoader', ),
		$container
	);
	return $service;
}, array ( 0 => 'run', ));

$container->addService('database', function($container) {
	$class = 'Nette\\Database\\Connection'; $service = new $class('mysql:host=localhost;dbname=test', 'user', 'password');
	return $service;
}, NULL);

$container->addService('model', function($container) {
	$class = 'Model'; $service = new $class($container->getService('database'));
	return $service;
}, NULL);

$container->addService('authenticator', function($container) {
	$service = call_user_func(
		array ( 0 => $container->getService('model'), 1 => 'createAuthenticatorService', ),
		$container
	);
	return $service;
}, NULL);

date_default_timezone_set('Europe/Prague');

Nette\Caching\Storages\FileStorage::$useDirectories = true;

foreach ($container->getServiceNamesByTag("run") as $name => $foo) { $container->getService($name); }
