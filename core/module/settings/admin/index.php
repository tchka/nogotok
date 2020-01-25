<?php
namespace Admin\Settings;
class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Settings');
		$this->setLinkModule('?module=settings&controller=index');
	}

	public function generate(){
		$this->addPath('Настройки', '?module=settings');

		if ($_GET['action']) {
			if (method_exists($this, $_GET['action'])) {
				$this-> {$_GET['action']} ();
			} else {
				$this->setOutput('Ошибка вызова функции.');
			}
		} else {
			$this->defaultAction();
		}

		return $this->getValues();
	}

	public function defaultAction() {
		$output = $this->showList(
			array(
				array('width' => '25%', 'title' => 'Идентификатор'),
				array('width' => '25%', 'title' => 'Наименование'),
				array('width' => '50%', 'title' => 'Значение'),
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'config_id', 'title', 'fn:showValue', 'action_edit', 'action_delete'
				)
			);

		$this->setOutput($output);
	}

}