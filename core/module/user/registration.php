<?php

namespace User;

class Registration {
	private $error = '';
	private $done = '';

	public function __construct($obj, $obj_uri) {

		if (user()->id()) {
			if ($_SERVER['HTTP_REFERER']) {
				app()->redirect('/');
			}
			else {
				app()->redirect( $_SERVER['HTTP_REFERER'] );
			}
		}

		if (count($obj_uri)) {
			app()->error404();
		}

		if ($_POST['form_id'] == 'registration') {
			if (strlen($_POST['name']) == 0) {
				$this->error = 'Укажите ваше имя.';
			}
			elseif (strlen($_POST['email']) == 0) {
				$this->error = 'Укажите ваш e-mail.';
			}
			elseif (!isEmail($_POST['email'])) {
				$this->error = 'Вы ввели не существующий e-mail.';
			}
			elseif (strlen($_POST['password']) == 0) {
				$this->error = 'Введите пароль.';
			}
			elseif (strlen($_POST['password']) < 5) {
				$this->error = 'Пароль должен быть не короче 5 символов.';
			}
			elseif ($_POST['password'] != $_POST['password2']) {
				$this->error = 'Пароли не совпадают.';
			}
			else {
				$u = \User::make()->findByAttributes(array('email' => $_POST['email']));

				if ($u->id()) {
					$this->error = 'Пользователь с таким e-mail уже существует.';
				}
				else {
					$data = array(
						'name' => $_POST['name'],
						'email' => $_POST['email'],
						'login' => $_POST['email'],
						'password' => encodePass($_POST['password']),
						'reg_ip' => remoteAddr(),
					);

					foreach ($data as $j => $i) {
						$data[$j] = "'".$i."'";
					}

					$u = new \User();
					$u->create($data);

					$this->done = 'Вы зарегистрированы на сайте.';
				}
			}
		}

	}

	public function run() {
		app()->template->setVars(array(
			'content' => \Kernel\Template::fast('template/user/registration.php', array(
				'param' => $_POST,
				'error' => $this->error,
				'done' => $this->done
			))
		));
	}

}