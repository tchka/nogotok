<?php
namespace Admin;
class defaultObject extends \Kernel\defaultObject {

	public function create( $data = array() ) {
		$fields = array();
		$arr = $this->getFields();
		foreach ($arr as $j => $i) {
			$fields[] = '`'.$i->name.'` = "'.htmlspecialchars($i->postValue()).'"';
			if ($i->name == 'id') $id = $i->postValue();
		}
		if ($this->table() == 'blog' || $this->table() == 'docs' || $this->table() == 'learn') {
			app()->db->query('insert into `prefix_'.$this->table().'` set '.implode(', ', $fields). ', `date` = ' . time() );
		} else {
			app()->db->query('insert into `prefix_'.$this->table().'` set '.implode(', ', $fields) );
		}
		$id = app()->db->getId();
		$this->init($id);
		if ($this->hasSort()) {
			$this->setVar('sort', $id);
		}
	}

	public function save() {
		$arr = $this->getFields();
		foreach ($arr as $j => $i) {
			if ($i->type == 'image') {
				if ($v = $i->postValue()) {
					if ($this->{$i->name}) {
						@unlink($_SERVER['DOCUMENT_ROOT'] . $i->getImageDir() .'/'. $this->{$i->name} );
					}

					$this->setVar($i->name, $v);
				}
			}
			elseif ($i->type) {
				$this->setVar($i->name, $i->postValue());
			}
		}
		$this->setVar('date', time());
	}

	public function Move($down = true) {
		/* default move down */
		$result = app()->db->getRow('select * from `prefix_'.$this->table().'` where `sort` '.($down ? '>' : '<').' '.intval($this->sort).' order by `sort` '.($down ? 'asc' : 'desc').' limit 0, 1');
		if ($result and $result[$this->fieldId()]) {
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($result['sort']).' where `'.$this->fieldId().'`='.intval($this->{$this->fieldId()}));
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($this->sort).' where `'.$this->fieldId().'`='.intval($result[$this->fieldId()]));
		}
	}

	public function MoveUp($asc = true) {
	    $asc = ($this->getSC() == 'asc');
		$this->Move(!$asc);
	}
        
	public function MoveDown($asc = true) {
	    $asc = ($this->getSC() == 'asc');
		$this->Move($asc);
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

		$tpl = new \Kernel\Template();
		$tpl->setVar('form_id', $form_id);
		$tpl->setVar('id', $this->id());
		$tpl->setVar('fields', $form);
		$tpl->setVar('errors', $this->_errors);
		return $tpl->parse('template/admin/form/default.php');
	}
        
}