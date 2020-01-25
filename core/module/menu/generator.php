<?php
namespace Menu;
class Generator {
	private $type = '';

	public function __construct($type) {
		$this->type = $type;
	}

	public function run() {
		$menu = $this->getTree();

		$tpl = new \Kernel\Template();
		$tpl->setVar('menu', $menu);
		return $tpl->parse('module/menu/tpl/'.$this->type.'.php');
	}

	public function getTree($parent_id = 0) {
		$output = array();
		$result = app()->db->query('select * from `prefix_menu` where `type`="'.$this->type.'" and `parent_id`='.$parent_id.' order by `sort` asc');
		while ($row = app()->db->fetchAssoc($result)) {
			$row['child'] = $this->getTree($row['menu_id']);
			$output[] = $row;
		}
		
		return $output;
	}

	public static function show($type) {
		$menu = new self($type);
		return $menu->run();
	}

}
