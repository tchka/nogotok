<?php
namespace Admin\User;
class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\User');
		$this->setLinkModule('?module=user&controller=index');
	}

	public function generate(){
		$this->addPath('Пользователи', '');
		$this->addPath('Администраторы', '?module=user');

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
		if (user()->user_id == 1) {
			$query = '';
		}
		else {
			$query = 'select * from `prefix_user` where `user_id` > 1';
		}

		$output.= '<div class="button">
			<a href="'.$this->getLinkModule().'&action=add">+ Добавить</a>
			</div>';

		if ($_SESSION['message_success']) {
			$output.= '<div class="done">'.$_SESSION['message_success'].'</div>';
			unset($_SESSION['message_success']);
		}

		$output.= $this->showList(
			array(
				'ID',
				array('width' => '50%', 'title' => 'Логин'),
				array('width' => '50%', 'title' => 'E-mail'),
				'&nbsp;',
				'&nbsp;',
				),
			array(
				'user_id', 'login', 'email', 'action_edit', 'action_delete'
				),
			$query
			);

		$this->setOutput($output);
	}

	public function add() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( );

		$form_id = 'add'.$this->getObjectName();
		if ($_POST['form_id'] == $form_id) {
			$result = $obj->create();

			if ($result !== false) {
				$_SESSION['message_success'] = 'Данные сохранены.';
				\Kernel\Redirect::Admin($this->getLinkModule());
			}
		}
		$this->setOutput($obj->FormCreate($form_id));
	}

}