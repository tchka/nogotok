<?php
namespace Admin\User;
class Admin extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\User');
		$this->setLinkModule('?module=user&controller=admin');
	}

	public function generate(){
		$this->addPath('Пользователи', '?module=user');
		$this->addPath('Администраторы', '?module=user&controller=admin');

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
				'ID',
				array('width' => '50%', 'title' => 'Логин'),
				array('width' => '50%', 'title' => 'E-mail'),
				'&nbsp;',
				),
			array(
				'user_id', 'login', 'email', 'action_delete'
				),
			'select * from `prefix_user` where `admin`=1 order by `user_id` asc'
			);

		$this->setOutput($output);
	}

	public function delete() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( $_GET['id'] );
		$obj->setVar('admin', 0);

		\Kernel\Redirect::Admin($this->getLinkModule());
	}
}