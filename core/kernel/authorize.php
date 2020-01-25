<?php

namespace Kernel;

/*
  Модуль авторизации

  необходимые таблицы и поля в базе данных

  _session {
          session_id VARCHAR(32) PRIMATY
          date DATETIME
          date_erase DATETIME
          user_id INT(4)
  }

  _user {
          user_id INT(4) PRIMARY
          login VARCHAR(255) UNIQ
          password VARCHAR(32)
          conf_save2week INT(1)
          logged_ip VARCHAR(15)
          logged_date DATETIME
  }

  Форма авторизации:
    form_id = authorize
    login
    password

*/

class Authorize {
    protected static $instance;

	public $user_id = 0;

	private $session = '';
	private $domain_cookie = '';

	private $property = array();

	public $error = '';

    private function __clone() { }
    private function __wakeup() { }
    public function __get($id) { return $this->property[$id]; }
    public static function getInstance() {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }


	private function __construct() {
		$this->SetConf();
		$this->Clear();

		if ($_POST["form_id"] == "authorize") {
			$result = app()->db->query('SELECT * FROM `prefix_user` WHERE `login`="'.htmlspecialchars($_POST["login"]).'" and `password`="'.$this->Encode($_POST["password"]).'"');
			if ($row = app()->db->FetchArray($result)) {
				$this -> SetUserFromRow($row);
			} else {
				$this -> error = "Неправильное имя пользователя или пароль.";
			}
		} else {
			$result = app()->db->Query("SELECT `user_id` FROM `prefix_session` WHERE `session_id`=\"".$this -> session."\"");
			if ($row = app()->db->FetchArray($result)) $this -> SetUser($row["user_id"]);
		}

		if ($this -> property['ban']) {
			$this -> Logout();
			$this -> user_id = 0;
			$this -> property = array();
			$this -> error = "Пользователь заблокирован.";
			return false;
		}
		
		if ($this -> user_id and $_SESSION['auth_redirect']) {
			$uri = $_SESSION['auth_redirect'];
			unset($_SESSION['auth_redirect']);
			Redirect::URI($uri);
		}
	}

	private function setConf() {
		$this->domain_cookie = app()->config->param('user/domain');

		$this -> session = isset($_COOKIE["session"]) ? $_COOKIE["session"] : md5(session_id().$_SERVER["REMOTE_ADDR"]);
	}

	private function encode($pass) {
		return encodePass($pass);
	}


	public function SetUser($user_id) {
		$result = app()->db->query("SELECT * FROM `prefix_user` WHERE `user_id`=".$user_id);
		if ($row = app()->db->FetchArray($result)) $this -> SetUserFromRow($row);
	}

	function SetUserFromRow($row) {
		$this -> user_id = $row["user_id"];
		$this -> property = $row;
		$this -> SetSession();
	}

	function SetSession() {
		app()->db->query("UPDATE `prefix_user` SET `logged_ip`=\"".$_SERVER["REMOTE_ADDR"]."\", `logged_date`=NOW() WHERE `user_id`=".$this -> user_id);
		app()->db->query("UPDATE `prefix_session` SET `user_id`=".$this -> user_id.", `date`=NOW(), `date_erase`=DATE_ADD(NOW(), INTERVAL 14 DAY) WHERE `session_id`=\"".$this -> session."\"");

		if (app()->db->AffectedRows() == 0) {
			app()->db->query("INSERT ignore INTO `prefix_session` (`session_id`, `user_id`, `date`, `date_erase`) VALUES (\"".$this -> session."\", ".$this -> user_id.", NOW(), DATE_ADD(NOW(), INTERVAL 14 DAY))");
		}
	}

	public function Refresh() {
		$this -> property = app()->db->getRow('SELECT * FROM `prefix_user` WHERE `user_id`='.intval($this->user_id));
	}

	public function Clear() {
		app()->db->query("DELETE FROM `prefix_session` WHERE `date_erase` < NOW()");
	}

	public function Logout() {
		app()->db->query("DELETE FROM `prefix_session` WHERE `session_id`=\"".$this -> session."\"");
		setcookie('session', "", time(), '/', $this -> domain_cookie);
	}

	public function isAdmin() {
		return ($this->user_id and $this->property['admin']);
	}

	public function hasError() {
		return (strlen($this->error) > 0);
	}

	public function getError() {
		return $this->error;
	}

	public function hasAccess($module) {
		if ($this->access == 0) return true;

		if ($module == 'object' and ($this->access & \User\Admin::T_OBJECT)) return true;
		if ($module == 'blog' and ($this->access & \User\Admin::T_BLOG)) return true;

		return false;
	}

	public function defaultAccess() {
		if ($this->access == 0) return 'object';

		if ($this->access & \User\Admin::T_OBJECT) return 'object';
		elseif ($this->access & \User\Admin::T_BLOG) return 'blog';
		else {
			$this->logout();
		}
	}

	public function id() {
		return intval($this->user_id);
	}

}
