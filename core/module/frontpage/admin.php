<?php

namespace Frontpage;

use Frontpage as Model;

class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'frontpage', 'id');

		$this->addField('name')->Title('Название')->Type('text');

		$this->addField('title')->Title('Заголовок')->Type('textarea');
		
		if ($this->id() == 8) {
			$this->addField('image')->Title('Изображение')->Type('image')->imageDir( Model::IMAGES_DIR );
		}

		$this->addField('text')->Title('Текст')->Type('visual');

		if ($this->id() == 5) {
			$this->addField('text2')->Title('Текст доп.')->Type('visual');
		}

		$this->addSort();
		$this->setSc('asc');
	}

}