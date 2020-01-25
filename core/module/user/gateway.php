<?php
namespace User;
class Gateway extends \Kernel\Gateway {

	public function form() {
		$this->setVar('content', \Kernel\Template::fast('template/user/login.php'));
	}

	public function login() {
		$result = app()->db->query('SELECT * FROM `prefix_user` WHERE `login`="'.htmlspecialchars($_POST["login"]).'" and `password`="'.encodePass($_POST["password"]).'"');
		if ($row = app()->db->FetchArray($result)) {
			user()->SetUserFromRow($row);
		} else {
			$this->addError("Неправильное имя пользователя или пароль.");
		}
	}

}
