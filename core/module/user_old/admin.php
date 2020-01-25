<?php
namespace User;
class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		$this->addField('login')->Title('Логин');
		$this->addField('password')->Title('Сменить пароль')->Type('password');
		$this->addField('email')->Title('E-mail')->Type('text');
		$this->addField('name')->Title('Имя')->Type('text');

		parent::__construct($id, 'user', 'user_id');
	}

	public function create( $data = array() ) {
		if (strlen($this->getField('login')->postValue()) == 0) {
			$this->addError('login', 'Логин не указан.');
			return false;
		}

		$n = app()->db->getVar('select count(*) from `prefix_user` where `login`="'.htmlspecialchars($this->getField('login')->postValue()).'"');
		if ($n > 0) {
			$this->addError('login', 'Пользователь с таким логином уже существует.');
			return false;
		}

		if (strlen($this->getField('password')->postValue()) == 0) {
			$this->addError('password', 'Пароль не указан.');
			return false;
		}

		$fields = array();
		$arr = $this->getFields();
		foreach ($arr as $j => $i) {
			$fields[] = '`'.$i->name.'` = "'.htmlspecialchars($i->postValue()).'"';
		}
		$fields[] = '`admin`=1';

		app()->db->query('insert into `prefix_'.$this->table().'` set '.implode(', ', $fields));
		if ($this->hasSort()) {
			$id = app()->db->getId();
			$this->init($id);
		}
	}

	public function save() {
		$arr = $this->getFields();
		foreach ($arr as $j => $i) {
			if ($i->type == 'password') {
				$v = $i->postValue();
				if (strlen($v)) {
					$this->setVar($i->name, $v);
				}
			}
			elseif ($i->type) {
				$this->setVar($i->name, $i->postValue());
			}
		}
	}

	public function FormCreate($form_id) {
		$tmp = new \Admin\defaultObject(null, '', '');
		$tmp->addField('login')->Title('Логин')->Type('text');
		$tmp->addField('password')->Title('Пароль')->Type('password');
		$tmp->addField('email')->Title('E-mail')->Type('text');
		$tmp->addField('name')->Title('Имя')->Type('text');

		if (count($this->_errors)) {
			foreach ($this->_errors as $j => $i) {
				$tmp->addError($i['field'], $i['text']);
			}
		}

		return $tmp->Form($form_id);
	}
}