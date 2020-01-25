<?php
class Object extends \Kernel\DefaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'object', 'object_id');
	}

	public function href() {
		if (!$this->_href) {
			$output = '/'.$this->name;

			if ($this->parent_id) {
				$tmp = new \Object($this->parent_id);
				$output = $tmp->href().$output;
			}
			
			$this->_href = $output;
		}

		return $this->_href;
	}

}