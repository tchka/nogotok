<?php

namespace Type;

use Type as Model;

class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'type', 'type_id');

		$this->addField('title')->Title('Имя')->Type('text');

		$this->addField('image')->Title('Изображение')->Type('image')->imageDir( Model::IMAGES_DIR )->ImagePreviewSize(400, 400);

		$this->addSort();
		$this->setSc('asc');
	}

}