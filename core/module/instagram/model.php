<?php

class Instagram extends \Kernel\defaultObject {
	const IMAGES_DIR = '/files/instagram';

	public function __construct($id) {
		parent::__construct($id, 'instagram', 'id');
	}

	public function thumb() {
		return self::IMAGES_DIR . '/' . $this->thumb;
	}

}