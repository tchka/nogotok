<?php

class Docs extends \Kernel\DefaultObject {
    
	public function __construct($id = null) {
		parent::__construct($id, 'docs', 'docs_id');
	}

	public function type() {
		if ($this->type_id) {
			$type_name = \Type::make($this->type_id)->title;
			return $type_name;
		}
	}
	
	public function icon() {
		if ($this->type_id) {
			$icon = \Type::make($this->type_id)->image;
			return $icon;
		}
	}


}