<?php

define('CORE', $_SERVER['DOCUMENT_ROOT'].'/core');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once(CORE.'/config.php');
require_once(CORE.'/functions.php');

session_start();

spl_autoload_register(function($class){
	if (strpos($class, '..') !== false or strpos($class, '//') !== false) {
		return false;
	}

	$path = explode('\\', strtolower($class));

	switch ($path[0]) {
		case 'kernel':
			$fname = '/'.implode('/', $path);
			break;
		case 'admin':
			if (count($path) == 3) {
				$fname = '/module/'.$path[1].'/admin/'.$path[2];
			}
			elseif (count($path) == 2) {
				$fname = '/admin/'.$path[1];
			}
			break;
		default:
			if (count($path) == 1) {
				$fname = '/module/'.implode('/', $path).'/model';
			} else {
				$fname = '/module/'.implode('/', $path);
			}
			break;
	}

	$fname = CORE.$fname.'.php';

	if (file_exists($fname)) {
		require_once $fname;
	} else {
		die('Unable to load '.$class);
	}

});

function app() {
	$app = \Kernel\Start::getInstance();
	return $app;
}

function admin() {
	$app = \Kernel\Admin::getInstance();
	return $app;
}

function user() {
	$app = \Kernel\Authorize::getInstance();
	return $app;
}

function obj() {
	$app = \Kernel\Start::getInstance();
	return $app->getObject();
}