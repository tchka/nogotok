<?php

class Catalog extends \Kernel\DefaultObject {
	const IMAGES_DIR = '/files/catalog/';
	private $_child;

	public function __construct($id = null) {
		parent::__construct($id, 'catalog', 'catalog_id');
	}

	public function href() {
		return '/standarty/' . $this->name; 
	}

	public function image() {
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

	public function child() {
		if (!$this->_child) {
			$this->_child = \Catalog::Make()->findAllBy('parent_id', $this->id);
		}
		return $this->_child;
	}
	
	public function menuTree($parent_id = 0) {
		$data = app()->db->getRows('select * from `prefix_catalog` where `parent_id` = '.$parent_id.' order by `sort` asc');
		foreach ($data as $j => $i) {
			$data[$j] = array(
				'object' => \Catalog\Category::make($i),
				'child' => array(),
			);

			$data[$j]['child'] = $this->menuTree($i['category_id']);
		}

		return $data;
	}



}