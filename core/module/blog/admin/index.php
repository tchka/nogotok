<?php

namespace Admin\Blog;

class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Blog');
		$this->setLinkModule('?module=blog&controller=index');
	}

	public function generate(){
		$this->addPath('Блог', '?module=blog');

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
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'fn:id', 'title',
				'action_moveup', 'action_movedown',
				'action_edit', 'action_delete'
				)
			);

		$this->setOutput($output);
	}

}