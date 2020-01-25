<?php

namespace Docs;

use Docs as Model;

class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'docs', 'docs_id');
		
		$this->addField('title')->Title('Заголовок')->Type('text');

		$this->addField('catalog_id')->Title('Категория')->Type('select')->Options(
			(array(0 => '- не выбрано -') + app()->db->combine('select `catalog_id`, `title` from `prefix_catalog` order by `title` asc'))
		);
		$this->addField('type_id')->Title('Тип документа')->Type('select')->Options(
			(array(0 => '- не выбрано -') + app()->db->combine('select `type_id`, `title` from `prefix_type` order by `title` asc'))
		);
		$this->addField('text')->Title('Описание')->Type('text');

		$this->addField('link')->Title('Ссылка')->Type('text');
		
		$this->addSort();
		$this->setSc('asc');
	}


	public function catalog() {
		if ($this->catalog_id) {
			return \Catalog::make($this->catalog_id)->title;
		}
	}
	
	public function type() {
		if ($this->type_id) {
			return \Type::make($this->type_id)->title;
		}
	}

	public function sortEditable() {
		return '<div class="jSortEditable" id="sort' . $this->id() . '" data-module="portfolio" data-id="' . $this->id() . '">' . $this->sort . '</div>';
	}

}