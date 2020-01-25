<?php
namespace News;
class Admin extends \Admin\defaultObject {

	public function __construct($id = null) {
		parent::__construct($id, 'news', 'news_id');

		$this->addField('title')->Title('Заголовок')->Type('text');
		$this->addField('text')->Title('Текст')->Type('visual');

		$this->addSort();
		$this->setSc('asc');
	}

	public function create( $data = array() ) {
		parent::create();

		if ($this->id()) {
			$this->saveVisible();
		}
	}

	public function save() {
		parent::save();

		if ($this->id()) {
			$this->saveVisible();
		}
	}

	public function saveVisible() {
		app()->db->query('delete from `prefix_news_visible` where `news_id`= '.intval($this->id()));
		if (is_array($_POST['objects'])) {
			foreach ($_POST['objects'] as $j => $i) {
				app()->db->query('insert into `prefix_news_visible` set
					`news_id`= '.intval($this->id()).',
					`object_id`='.intval($i)
					);
			}
		}
	}

	public function move($down = true) {
		/* default move down */
		$result = app()->db->getRow('select * from `prefix_'.$this->table().'` where `type` = "'.$this->type.'" and `sort` '.($down ? '>' : '<').' '.intval($this->sort).' order by `sort` '.($down ? 'asc' : 'desc').' limit 0, 1');
		if ($result and $result[$this->fieldId()]) {
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($result['sort']).' where `'.$this->fieldId().'`='.intval($this->{$this->fieldId()}));
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($this->sort).' where `'.$this->fieldId().'`='.intval($result[$this->fieldId()]));
		}
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

			$i = new \Kernel\Field('objects');
			$i->Title('Где показывать?')->Type('custom')->defaultValue($this->objectsField());

			$form[] = $i;
		}

		$tpl = new \Kernel\Template();
		$tpl->setVar('form_id', $form_id);
		$tpl->setVar('id', $this->id());
		$tpl->setVar('fields', $form);
		$tpl->setVar('errors', $this->_errors);
		return $tpl->parse('template/admin/form/default.php');
	}

	private function objectsField() {
		$tpl = new \Kernel\Template();

		$tpl->setVar('checked', app()->db->getVars('select `object_id` from `prefix_news_visible` where `news_id`='.intval($this->id())));

		$obj = new \Object\Admin();
		$tpl->setVar('objects', $obj->getTree());

		return $tpl->parse('module/news/admin/tpl/objects.php');
	}


}