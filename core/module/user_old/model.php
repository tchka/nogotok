<?php
class User extends \Kernel\defaultObject {

	public function __construct($id, $field = '') {
		if (!is_numeric($id) and !is_array($id)) {
			switch ($field)  {
				case 'login':
					$this->findByLogin($id);
					break;
				default:
					break;
			}


		} else {
			parent::__construct($id, 'user', 'user_id');
		}
	}

	public function findByLogin($id) {
		$result = app()->db->query('select * from `prefix_user` where `login` like "'.htmlspecialchars($id).'"');
		if ($row = app()->db->fetchAssoc($result)) {
			$this->__construct($row);
			return $row;
		}
		else return false;
	}

}