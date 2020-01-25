<?php
namespace Admin\News;
class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\News');
		$this->setLinkModule('?module=news&controller=index');
	}

	public function generate(){
		$this->addPath('Новости', '?module=news');

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
				array('width' => '80%', 'title' => 'Название'),
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'title',
				'action_moveup', 'action_movedown',
				'action_edit', 'action_delete'
				)
			);

		$this->setOutput($output);
	}

}