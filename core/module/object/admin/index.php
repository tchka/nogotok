<?php
namespace Admin\Object;
class Index extends \Admin\Index {

	public function __construct() {
		$this->setObjectName('\\Object');
		$this->setLinkModule('?module=object&controller=index');
	}

	public function generate(){
		$this->addPath('Страницы', '?module=object');

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
		$output = '<div class="button"><a href="'.$this->getLinkModule().'&action=add">+ Добавить</a></div>';

		$output.= "<table cellspacing='0' class='item-table'>";

		//$output.= "<tr><td class='navigation' colspan='6'>".$navi."</td></tr>";

		$output.= "<tr>";
			$output.= "<th width='40%'>Страница</th>";
			$output.= "<th width='40%'>URL</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
		$output.= "</tr>";

		$output.= $this->showLevel();

		$output.= "</table>";

		$this->setOutput($output);
	}

	private function showLevel($parent_id = 0, $url = '', $level = 0) {
		$result = app()->db->query('select * from `prefix_object` where `parent_id`='.$parent_id.' order by `sort` asc');
		while ($row = app()->db->fetchAssoc($result)) {
			$obj = new \Object($row);

			$output.= '<tr>
					<td style="padding-left: '.($level*20 +10).'px">'.$row['title'].'</td>
					<td><a href="http://'.app()->config->param('domain').$url.'/'.$row['name'].'" target="_blank">http://'.app()->config->param('domain').$url.'/'.$row['name'].'</a></td>
					<td><a href="'.$this->getLinkModule().'&action=moveup&id='.$obj->id().'" class="moveup"></a></td>
					<td><a href="'.$this->getLinkModule().'&action=movedown&id='.$obj->id().'" class="movedown"></a></td>
					<td><a href="'.$this->getLinkModule().'&action=edit&id='.$obj->id().'" class="edit"></a></td>
					<td>'.($obj->access_delete ? '<a href="'.$this->getLinkModule().'&action=delete&id='.$obj->id().'" class="delete" onclick="return confirm(\'Удалить?\');"></a>' : '').'</td>
				</tr>';

			$output.= $this->showLevel($obj->id(), $url.'/'.$obj->name, $level+1);
		}

		return $output;
	}

}