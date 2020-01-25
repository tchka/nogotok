<?php

namespace Admin\Frontpage;

class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Frontpage');
		$this->setLinkModule('?module=frontpage&controller=index');
	}

	public function generate(){
		$this->addPath('Главная страница', '?module=frontpage');

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
		$output = '<div class="button"><a href="'.$this->getLinkModule().'&action=add">+ Добавить</a></div>';

		$output.= $this->showList(
			array(
				'ID',
				array('width' => '90%', 'title' => 'Название'),
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'fn:id', 'name',
				'action_edit', 'action_delete'
				)
		);

		$this->setOutput($output);
	}

}