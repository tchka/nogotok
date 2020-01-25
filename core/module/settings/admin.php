<?php
namespace Settings;
class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		$this->addField('config_id')->Title('Имя');
		$this->addField('title')->Title('Наименование');
		$this->addField('value')->Title('Значение');

		parent::__construct($id, 'config', 'id');

		switch ($this->type) {
			case "visual":
				$this->getField('value')->Type('visual');
				break;
			case "textarea":
				$this->getField('value')->Type('textarea');
				break;
			default:
				$this->getField('value')->Type('text');
				break;
		}
	}

	public function showValue() {
		return nl2br($this->value);
	}
}