<?php

namespace User;

class Logout {

	public function __construct($obj, $obj_uri) {
		user()->logout();

		if ($_SERVER['HTTP_REFERER']) {
			app()->redirect('/');
		}
		else {
			app()->redirect( $_SERVER['HTTP_REFERER'] );
		}
	}

	public function run() { }

}