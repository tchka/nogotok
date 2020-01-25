<?php

namespace User;

class Cabinet {
	private $error = '';
	private $done = '';

	public function __construct($obj, $obj_uri) {

		if (!user()->id()) {
			if ($_SERVER['HTTP_REFERER']) {
				app()->redirect('/');
			}
			else {
				app()->redirect( $_SERVER['HTTP_REFERER'] );
			}
		}

		if (count($obj_uri)) {
			app()->error404();
		}

	}

	public function run() {
		app()->template->setVars(array(
			'content' => \Kernel\Template::fast('template/user/cabinet.php')
		));
	}

}