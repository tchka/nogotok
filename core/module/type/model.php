<?php

class Type extends \Kernel\DefaultObject {
	const IMAGES_DIR = '/files/type/';

	public function __construct($id = null) {
		parent::__construct($id, 'type', 'type_id');
	}

	public function href() {
		return '/service/' . $this->name;
	}

	public function image() {
		return self::IMAGES_DIR . $this->image;
	}

	public function thumb() {
		if (file_exists(ROOT . self::IMAGES_DIR . '_pv_400x400_' . $this->image )) {
			return self::IMAGES_DIR . '_pv_400x400_' . $this->image;
		}

		return self::IMAGES_DIR . $this->image;
	}


}