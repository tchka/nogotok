<?php

namespace Admin\Docs;

class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Docs');
		$this->setLinkModule('?module=docs&controller=index');
	}

	public function generate(){
		$this->addPath('Документы', '?module=docs');

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
				array('width' => '80%', 'title' => 'Название'),
				array('width' => '5%', 'title' => 'Сортировка'),
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'fn:id', 'title',
				'fn:sortEditable',
				'action_moveup', 'action_movedown',
				'action_edit', 'action_delete'
				)
			);

		$this->setOutput($output);
	}

}