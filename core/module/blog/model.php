<?php

class Blog extends \Kernel\DefaultObject {
	const IMAGES_DIR = '/files/blog/';

	public function __construct($id = null) {
		parent::__construct($id, 'blog', 'blog_id');
	}

	public function href() {
		return '/stati/' . $this->name;
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