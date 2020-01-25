<?php
namespace Menu;
class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		$this->addField('type')->Type('hidden');
		$this->addField('title')->Title('Заголовок')->Type('text');
		$this->addField('href')->Title('Ссылка')->Type('text');
		$this->addField('parent_id')->Title('Принадлежит разделу')->Type('hidden');

		$this->addSort();
		$this->setSc('asc');

		parent::__construct($id, 'menu', 'menu_id');
	}

	public function Form($form_id) {
		if ($_POST['form_id'] == $form_id) {
			$form = array();
			$arr = $this->getFields();
			foreach ($arr as $j => $i) {
				$i->setPostValue();
				$form[] = $i;
			}
		} else {
			$form = array();
			$arr = $this->getFields();
			foreach ($arr as $j => $i) {
				$i->Value($this->{$i->name});
				$form[] = $i;
			}
		}

		$type = $this->id() ? $this->type : $this->getField('type')->defaultValue();
		if (app()->config->param('menu/'.$type.'/max level') > 1) {
			if (!$this->id() and app()->config->param('menu/'.$type.'/max item')>0 and app()->config->param('menu/'.$type.'/max item') <= app()->db->getVar('select count(*) from `prefix_menu` where `type`="'.$type.'" and `parent_id`=0') ) {
				$options = $this->getParentOptions($type);
			}
			else {
				$options = array(0 => '') + $this->getParentOptions($type);
			}
			$this->getField('parent_id')->Type('select')->Options($options);
		}

		$tpl = new \Kernel\Template();
		$tpl->setVar('form_id', $form_id);
		$tpl->setVar('id', $this->id());
		$tpl->setVar('fields', $form);
		$tpl->setVar('errors', $this->_errors);

		$obj = new \Object\Admin();
		$tpl->setVar('quicklinks', $obj->getTree());

		return $tpl->parse('module/menu/admin/tpl/form.php');
	}
        
	private function getParentOptions($type, $parent_id = 0, $level = 1) {
		$output = array();
		$result = app()->db->query('select * from `prefix_menu` where `type`="'.$type.'" and `parent_id`='.$parent_id.' and `menu_id` <> '.intval($this->id()).' order by `sort` asc');
		while ($row = app()->db->fetchAssoc($result)) {
			$output[$row['menu_id']] = str_pad('', ($level-1)*3, '.').$row['title'];

			if ($level+1 < app()->config->param('menu/'.$type.'/max level')) {
				$output+= $this->getParentOptions($type, $row['menu_id'], $level+1);
			}
		}
		return $output;
	}

	public function Move($down = true) {
		/* default move down */
		$result = app()->db->getRow('select * from `prefix_'.$this->table().'` where `sort` '.($down ? '>' : '<').' '.intval($this->sort).' and `parent_id`='.intval($this->parent_id).' and `type` like "'.$this->type.'" order by `sort` '.($down ? 'asc' : 'desc').' limit 0, 1');
		if ($result and $result[$this->fieldId()]) {
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($result['sort']).' where `'.$this->fieldId().'`='.intval($this->{$this->fieldId()}));
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($this->sort).' where `'.$this->fieldId().'`='.intval($result[$this->fieldId()]));
		}
	}

}