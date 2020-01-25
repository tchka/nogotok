<?
namespace User\Admin;

class Gateway extends \Kernel\Gateway {

	public function search() {
		$r = array();

		$users = app()->db->getRows('select `user_id`, `login` from `prefix_user` where `login` like "%'.$_GET['f'].'%" and `user_id` > 1');
		foreach ($users as $j => $i) {
			$r[] = $i;
		}

		$this->setVar('result', $r);
	}

	public function is_exists() {
		$id = app()->db->getVar('select `user_id` from `prefix_user` where `login` like "'.$_GET['f'].'" and `user_id` > 1');

		if ($id) $this->setVar('user_id', $id);
		else $this->addError('User not found');
	}

}