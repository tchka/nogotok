<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);

//if ($_GET['debug'] == 1) {
	ini_set('display_errors', 'on');
//}
//else {
//	ini_set('display_errors', 'off');
//}

mb_internal_encoding('utf-8');

function array_prepare($a) {
	foreach ($a as $j => $i) {
		if (is_array($i)) {
			$a[$j] = array_prepare($i);
		}
		else {
			$a[$j] = stripslashes($i);
		}
	}
	return $a;
}
if (get_magic_quotes_gpc()) {
	$_POST = array_prepare($_POST);
}

$config = array(
	'db' => array(
		'host' => 'localhost',
		'user' => 'root',
		'pass' => '',
		'dbname' => 'ng',
		'prefix' => 'sb'
		),

	'user' => array(
		'domain' => '.nogotok',
		'session_time' => 3600*24*7,
		'salt'=> 'i2yo876odIYBIL@BYLIYbcl2g829827l927J:)(&@J(*&2ho6ehL@^B lcl*@ 62LIG^@l967l2H',
		),
	'domain' => 'nogotok',
	'admin' => '/control/',
	'template' => array(
		'dir' => '/../template',
		'default' => 'webpage.php',
		),
	'modules' => array(
		'' => '',
		'catalog|index' => 'Стандарты',
		'type|index' => 'Типы документов',
		'blog|index' => 'Новости',
		'learn|index' => 'Обучение',
		'search|generator' => 'Поиск',
		'user|logout' => 'Выход',
		),
	'menu' => array(
		'main' => array(
			'title' => 'Главное меню',
			'access delete' => true,
			'access title' => true,
			'access href' => true,
			'max item' => 0,
			'max level' => 1,
			'limit title' => 0,
		),
		/*'top' => array(
			'title' => 'Верхнее меню',
			'access delete' => true,
			'access title' => true,
			'access href' => true,
			'max item' => 0,
			'max level' => 2,
			'limit title' => 0,
		),*/
	),
	'instagram' => array(
		'api' => 'https://api.instagram.com/v1/users/self/media/recent/?count=4&access_token=8038832833.37b49e1.f137c489282644f2b02a1aa2f66f4b36',
		'timeout' => 3600, // update each 1 hour
	),
	'sitemap' => array(
		'timeout' => 259200, // update each 3 days
	),
);
