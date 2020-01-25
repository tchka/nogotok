<?php
class Settings extends \Kernel\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'config', 'id');
	}

}