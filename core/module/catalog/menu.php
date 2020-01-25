<?php

namespace Catalog;
class Menu {

	private function menuTree($parent_id = 0) {
		$data = app()->db->getRows('select * from `prefix_catalog` where `parent_id` = '.$parent_id.' order by `sort` asc');
		foreach ($data as $j => $i) {
			$data[$j] = array(
				'object' => \Catalog::make($i),
				'child' => array(),
			);

			$data[$j]['child'] = $this->menuTree($i['catalog_id']);
		}

		return $data;
	}

	public static function Render() {
		$self = new self();

		$tpl = new \Kernel\Template();
		$tpl->setVar('data', $self->menuTree() );
		return $tpl->parse('module/catalog/tpl/menu.php');
	}
	public static function RenderCat($category=0) {
		$self = new self();

		$tpl = new \Kernel\Template();
		$tpl->setVar('data', $self->menuTree() );
		$tpl->setVar('category', $category );
		return $tpl->parse('module/catalog/tpl/menu.php');
	}

}