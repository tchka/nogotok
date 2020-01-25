<?php

class Frontpage extends \Kernel\DefaultObject {
	const IMAGES_DIR = '/files/slider/';

	public function __construct($id = null) {
		parent::__construct($id, 'frontpage', 'id');
	}

	public function image() {
		return self::IMAGES_DIR . $this->image;
	}

}