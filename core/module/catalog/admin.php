<?php

namespace Catalog;

use Catalog as Model;

class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'catalog', 'catalog_id');

		$this->addField('title')->Title('Заголовок')->Type('text');
		$this->addField('name')->Title('URL')->Type('text');

		if (!$this->id()) {
			$this->getField('title')->Param('onchange', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
			$this->getField('name')->Param('onfocus', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
		}
		$this->addField('parent_id')->Title('Родитель')->Type('select');
		
		$this->addField('metatitle')->Title('META Title')->Type('text');
		$this->addField('keywords')->Title('META Keywords')->Type('text');
		$this->addField('meta_description')->Title('META Description')->Type('text');



		$this->addField('text')->Title('Текст')->Type('visual');


		$this->addSort();
		$this->setSc('asc');
	}
	
		public function sortEditable() {
		return '<div class="jSortEditable" id="sort' . $this->id() . '" data-module="article" data-id="' . $this->id() . '">' . $this->sort . '</div>';
	}

	public function getParents($parent_id = 0, $level = 0) {
		$out = array();

		foreach (
			app()->db->getRows('select `catalog_id`, `title` from `prefix_'.$this->table().'` where `parent_id`='.$parent_id.' and `catalog_id` <> '.intval($this->id()).' order by `sort` asc')
			as $j
		) {
			$j['title'] = str_pad('', 3*$level, '.') . $j['title'];
			$out[] = $j;

			$out = array_merge($out, $this->getParents($j['catalog_id'], $level+1));
		}

		if ($parent_id == 0) {
			$r = array(0 => '');

			foreach ($out as $j => $i) {
				$r[$i['catalog_id']] = $i['title'];
			}

			return $r;
		}

		return $out;
	}


	public function Form($form_id) {
		$this->getField('parent_id')->Options( $this->getParents() );
		return parent::form( $form_id );
	}

	
	public function parent() {
		if ($this->parent_id) {
			return \Catalog::make($this->parent_id)->title;
		}
	}
	
}