<?php

namespace Blog;

use Blog as Model;

class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'blog', 'blog_id');

		$this->addField('title')->Title('Заголовок')->Type('text');
		$this->addField('name')->Title('URL')->Type('text');

		if (!$this->id()) {
			$this->getField('title')->Param('onchange', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
			$this->getField('name')->Param('onfocus', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
		}
		$this->addField('metatitle')->Title('META Title')->Type('text');
		$this->addField('keywords')->Title('META Keywords')->Type('text');
		$this->addField('meta_description')->Title('META Description')->Type('text');
		$this->addField('active')->Title('Публиковать')->Type('checkbox');

		$this->addField('announce')->Title('Анонс')->Type('textarea');

		$this->addField('image')->Title('Изображение')->Type('image')->imageDir( Model::IMAGES_DIR )->ImagePreviewSize(400, 400);

		$this->addField('text')->Title('Текст')->Type('visual');
		
		$this->addSort();
		$this->setSc('desc');
	}

}