<?php

class Learn extends \Kernel\DefaultObject {
	const IMAGES_DIR = '/files/learn/';

	public function __construct($id = null) {
		parent::__construct($id, 'learn', 'learn_id');
	}

	public function href() {
		return '/learn/' . $this->name;
	}

	public function image() {
		return self::IMAGES_DIR . $this->image;
	}

	public function thumb() {
		if (file_exists(ROOT . self::IMAGES_DIR . '_pv_450x300_' . $this->image )) {
			return self::IMAGES_DIR . '_pv_450x300_' . $this->image;
		}

		return self::IMAGES_DIR . $this->image;
	}
	public function meta_descr() {
		$meta_descr = $this->meta_description;

		return $meta_descr;
	}

	public function meta_title() {
		$meta_descr = $this->metatitle;

		return $meta_descr;
	}

	public function meta_keyw() {
		$meta_descr = $this->keywords;

		return $meta_descr;
	}

}