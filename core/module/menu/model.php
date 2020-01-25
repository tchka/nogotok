<?php
class Menu extends \Kernel\defaultObject {

	public function __construct($id) {
		parent::__construct($id, 'menu', 'menu_id');
	}

}