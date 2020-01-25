<?php
namespace Admin\Menu;
class Index extends \Admin\Index {
	private $type = '';
	private $param = '';

	public function __construct() {
		$this->type = $_GET['type'];

		$this->setObjectName('\\Menu');
		$this->setLinkModule('?module=menu&controller=index&type='.$this->type);

		$this->param = app()->config->param('menu/'.$this->type);
	}

	public function generate(){
		$this->addPath('Меню', '');
		$this->addPath($this->param['title'], $this->getLinkModule());

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
		$max_n = app()->config->param('menu/'.$this->type.'/max item');
		$max_l = app()->config->param('menu/'.$this->type.'/max level');
		$n = app()->db->getVar('select count(*) from `prefix_menu` where `type`="'.$this->type.'" and `parent_id`=0');

		if ($max_l >1 or $max_n == 0 or $max_n > $n) {
			$output = '<div class="button"><a href="'.$this->getLinkModule().'&action=add">+ Добавить</a></div>';
		}

		$output.= "<table cellspacing='0' class='item-table'>";

		$output.= "<tr>";
			$output.= "<th width='40%'>Заголовок</th>";
			$output.= "<th width='40%'>Ссылка</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
			$output.= "<th width='5%'>&nbsp;</th>";
		$output.= "</tr>";

		$output.= $this->showLevel();

		$output.= "</table>";

		$this->setOutput($output);
	}

	private function showLevel($parent_id = 0, $level = 0) {
		$result = app()->db->query('select * from `prefix_menu` where `type` = "'.$this->type.'" and `parent_id`='.$parent_id.' order by `sort` asc');
		while ($row = app()->db->fetchAssoc($result)) {
			$obj = new \Menu\Admin($row);

			$output.= '<tr>
					<td style="padding-left: '.($level*20 +10).'px">'.$obj->title.'</td>
					<td><a href="http://'.app()->config->param('domain').$obj->href.'" target="_blank">http://'.app()->config->param('domain').$obj->href.'</a></td>
					<td><a href="'.$this->getLinkModule().'&action=moveup&id='.$obj->id().'" class="moveup"></a></td>
					<td><a href="'.$this->getLinkModule().'&action=movedown&id='.$obj->id().'" class="movedown"></a></td>
					<td><a href="'.$this->getLinkModule().'&action=edit&id='.$obj->id().'" class="edit"></a></td>
					<td>'.((app()->config->param('menu/'.$this->type.'/access delete')) ? '<a href="'.$this->getLinkModule().'&action=delete&id='.$obj->id().'" class="delete" onclick="return confirm(\'Удалить?\');"></a>' : '').'</td>
				</tr>';

			$output.= $this->showLevel($obj->id(), $level+1);
		}

		return $output;
	}

	public function add() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( );
		$obj->getField('type')->defaultValue($this->type);

		$form_id = 'add'.$this->getObjectName();
		if ($_POST['form_id'] == $form_id) {
			$obj->create();

			$_SESSION['message_success'] = 'Данные сохранены.';
			\Kernel\Redirect::Admin($this->getLinkModule());
		}
		$this->setOutput($obj->Form($form_id));
	}

}