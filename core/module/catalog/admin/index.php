<?php

namespace Admin\Catalog;
class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Catalog');
		$this->setLinkModule('?module=catalog&controller=index');
	}

	public function generate(){
		$this->addPath('Каталог', '?module=catalog');
		$this->addPath('Разделы', $this->getLinkModule());

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
				array('width' => '50%', 'title' => 'Название'),
				array('width' => '30%', 'title' => 'Раздел'),
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'title', 'fn:parent',
				'action_moveup', 'action_movedown',
				'action_edit', 'action_delete'
				)
			);

		$this->setOutput($output);
	}

}