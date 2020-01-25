<?php
namespace Admin;
class Index {
	public $values = array(
		'path' => '',
		'legend' => '',
		'output' => '',
		);
	private $path = array();

	private $object_name = '';
	private $link_module = '';

	protected $one_page = 0;
	protected $page = 0;

	public function __construct() {
	}

	public function addPath($text, $href = '') {
		$this->path[] = strlen($href) ? '<a href="'.$href.'">'.$text.'</a>' : $text;
	}
	public function setLegend($text) { $this->values['legend'] = $text; }
	public function setOutput($text) { $this->values['output'] = $text; }
	public function appendOutput($text) { $this->values['output'].= $text; }
	public function prependOutput($text) { $this->values['output'] = $text.$this->values['output']; }

	private function genPath() {
		$this->values['path'] = implode(' &gt; ', $this->path);
	}

	public function getValues() {
		$this->genPath();
		return $this->values;
	}

	public function setObjectName($name) {
		$this->object_name = $name;
	}

	public function getObjectName() {
		return $this->object_name;
	}

	public function setLinkModule($linkto) {
		$this->link_module = $linkto;
	}
	public function getLinkModule() {
		return $this->link_module;
	}

	public function moveUp() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( $_GET['id'] );
		$obj->MoveUp();

		\Kernel\Redirect::Admin($this->getLinkModule());
	}

	public function moveDown() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( $_GET['id'] );
		$obj->MoveDown();

		\Kernel\Redirect::Admin($this->getLinkModule());
	}

	public function add() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( );

		$form_id = 'add'.$this->getObjectName();
		if ($_POST['form_id'] == $form_id) {
			$obj->create();

			$_SESSION['message_success'] = 'Данные сохранены.';
			\Kernel\Redirect::Admin($this->getLinkModule());
		}
		$this->setOutput($obj->Form($form_id));
	}

	public function edit() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( intval($_GET['id']) );
		if ($obj->id()) {
			$form_id = 'edit'.$this->getObjectName();
			if ($_POST['form_id'] == $form_id) {
				$obj->save();

				$_SESSION['message_success'] = 'Данные сохранены.';
				\Kernel\Redirect::Admin($this->getLinkModule());
			}
			$this->setOutput($obj->Form($form_id));
		} else {
			$this->setOutput('Not found');
		}
	}

	public function delete() {
		$objname = $this->getObjectName().'\\Admin';
		$obj = new $objname ( $_GET['id'] );
		$obj->drop();

		\Kernel\Redirect::Admin($this->getLinkModule());
	}

	public function showList($columns, $rows, $query = '') {
		$n = 0;

		$output.= "<table cellspacing='0' class='item-table'>";

		//$output.= "<tr><td class='navigation' colspan='6'>".$navi."</td></tr>";

		$output.= "<tr>";
			foreach ($columns as $j => $i) {
				if (is_array($i)) {
					$output.= '<th width="'.$i['width'].'">'.$i['title'].'</th>';
				} else {
					$output.= '<th>'.$i.'</th>';
				}
			}
		$output.= "</tr>";

		$obj_name = $this->getObjectName().'\\Admin';

		if (!$query or is_array($query)) {
			$obj = new $obj_name (0);

			if (is_array($query) and $query['order']) $order_by = $query['order'];
			else $order_by = '`'.($obj->hasSort() ? 'sort' : $obj->fieldId()).'` '.$obj->getSc();

			$query = 'select * from `prefix_'.$obj->table().'` where 1 order by ' . $order_by;
			
			if ($this->one_page) {
				$n = app()->db->getVar('select count(*) from `prefix_'.$obj->table().'`');
				$this->page = ($_GET['page']-1);
				if ($this->page < 0) { $this->page = 0; }
				$query.= ' limit '.($this->page * $this->one_page).', '.$this->one_page;
			}
		}
		elseif (strpos(strtolower($query), 'select') === false) {
			$q = $query;

			$obj = new $obj_name (0);
			$query = 'select * from `prefix_'.$obj->table().'` where '.$q.' order by `'.($obj->hasSort() ? 'sort' : $obj->fieldId()).'` '.$obj->getSc();

			if ($this->one_page) {
				$n = app()->db->getVar('select count(*) from `prefix_'.$obj->table().'` where ' . $q);
				$this->page = $_GET['page'];
				if ($this->page < 1) { $this->page = 1; }
				$query.= ' limit '.(($this->page-1) * $this->one_page).', '.$this->one_page;
			}
		}

		$result = app()->db->query($query);

		if (app()->db->numRows($result) == 0) {
			$output.= '<tr>';
				$output.= '<td colspan="'.count($rows).'">Нет данных</td>';
			$output.= '</tr>';
		}

		while ($row = app()->db->fetchAssoc($result)) {
			$obj = new $obj_name ($row);

			$output.= '<tr>';

				foreach ($rows as $j => $i) {
					switch ($i) {
						case 'action_moveup':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=moveup&id='.$obj->id().'" class="moveup"></a></td>';
							break;
						case 'action_movedown':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=movedown&id='.$obj->id().'" class="movedown"></a></td>';
							break;
						case 'action_edit':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=edit&id='.$obj->id().'" class="edit"></a></td>';
							break;
						case 'action_delete':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=delete&id='.$obj->id().'" class="delete" onclick="return confirm(\'Удалить?\');"></a></td>';
							break;
						case 'action_view':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=view&id='.$obj->id().'" class="view"></a></td>';
							break;
						default:
							if (substr($i, 0, 7) == 'active:') {
								$i = substr($i, 7);
								$output.= '<td '.($obj->active ? '' : 'class="unactive"').'>'; 
							} 
							else { $output.= '<td>'; }


							if (substr($i, 0, 3) == 'fn:' and method_exists($obj, substr($i, 3))) {
								$i = substr($i, 3);
								$output.= $obj->$i ();
							}
							else { $output.= $obj->$i; }

							$output.= '</td>';
							break;
					}
				}

			$output.= '</tr>';
		}

		$output.= "</table>";

		if ($n and $this->one_page) {
			unset($_GET['page']);
			$navi = new \Kernel\Navigation($this->page+1, $n, $this->one_page, '?'.http_build_query($_GET), '&page=');
			$output.= '<div class="navi">'.$navi->render().'</div>';
		}

		return $output;
	}


	public function showListLevel($parent_field, $columns, $rows, $query = '') {
		$n = 0;

		$output.= "<table cellspacing='0' class='item-table'>";

		$output.= "<tr>";
			foreach ($columns as $j => $i) {
				if (is_array($i)) {
					$output.= '<th width="'.$i['width'].'">'.$i['title'].'</th>';
				} else {
					$output.= '<th>'.$i.'</th>';
				}
			}
		$output.= "</tr>";

		$output.= $this->showListLevelItems($parent_field, $rows, $query);

		$output.= "</table>";

		if ($n and $this->one_page) {
			unset($_GET['page']);
			$navi = new \Kernel\Navigation($this->page+1, $n, $this->one_page, '?'.http_build_query($_GET), '&page=');
			$output.= '<div class="navi">'.$navi->render().'</div>';
		}

		return $output;
	}

	private function showListLevelItems($parent_field, $rows, $query, $parent_id = 0, $level = 0) {
		$obj_query = $query;
		$obj_name = $this->getObjectName().'\\Admin';

		if (!$query) {
			$obj = new $obj_name (0);
			$query = 'select * from `prefix_'.$obj->table().'` where `'.$parent_field.'` = '.$parent_id.' order by `'.($obj->hasSort() ? 'sort' : $obj->fieldId()).'` '.$obj->getSc();
			
			if ($this->one_page) {
				$n = app()->db->getVar('select count(*) from `prefix_'.$obj->table().'`');
				$this->page = ($_GET['page']-1);
				if ($this->page < 0) { $this->page = 0; }
				$query.= ' limit '.($this->page * $this->one_page).', '.$this->one_page;
			}
		}

		$result = app()->db->query($query);

		if (app()->db->numRows($result) == 0 and $level == 0) {
			$output.= '<tr>';
				$output.= '<td colspan="'.count($rows).'">Нет данных</td>';
			$output.= '</tr>';
		}

		while ($row = app()->db->fetchAssoc($result)) {
			$obj = new $obj_name ($row);

			$output.= '<tr>';

				foreach ($rows as $j => $i) {
					switch ($i) {
						case 'action_moveup':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=moveup&id='.$obj->id().'" class="moveup"></a></td>';
							break;
						case 'action_movedown':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=movedown&id='.$obj->id().'" class="movedown"></a></td>';
							break;
						case 'action_edit':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=edit&id='.$obj->id().'" class="edit"></a></td>';
							break;
						case 'action_delete':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=delete&id='.$obj->id().'" class="delete" onclick="return confirm(\'Удалить?\');"></a></td>';
							break;
						case 'action_view':
							$output.= '<td><a href="'.$this->getLinkModule().'&action=view&id='.$obj->id().'" class="view"></a></td>';
							break;
						default:
							if (substr($i, 0, 7) == 'active:') {
								$i = substr($i, 7);
								$output.= '<td '.($obj->active ? '' : 'class="unactive"').'>'; 
							} 
							else { $output.= '<td>'; }

							$i_sub = false;
							if (substr($i, 0, 4) == 'sub:') {
								$i_sub = true;
								$i = substr($i, 4);
								$output.= '<span style="padding-left: '.($level * 20).'px">'; 
							} 

							if (substr($i, 0, 3) == 'fn:' and method_exists($obj, substr($i, 3))) {
								$i = substr($i, 3);
								$output.= $obj->$i ();
							}
							else { $output.= $obj->$i; }

							if ($i_sub) {
								$output.= '</span>';
							}

							$output.= '</td>';
							break;
					}
				}

			$output.= '</tr>';

			$output.= $this->showListLevelItems($parent_field, $rows, $obj_query, $obj->id(), $level+1);
		}

		return $output;
	}

}
