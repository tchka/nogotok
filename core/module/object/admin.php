<?php
namespace Object;
class Admin extends \Admin\defaultObject {
	private $parent_options = array(0 => '');

	public function __construct($id = null) {
		parent::__construct($id, 'object', 'object_id');

		$this->addField('title')->Title('Заголовок')->Type('text');
		$this->addField('name')->Title('URL')->Type('text');

		if (!$this->id()) {
			$this->getField('title')->Param('onchange', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
			$this->getField('name')->Param('onfocus', 'if ($(\'input[name=name]\').val() == \'\') translitUrl(\'input[name=title]\', \'input[name=name]\');');
		}

		$this->addField('redirect')->Title('Переадресация')->Type('text');
		$this->addField('metatitle')->Title('META Title')->Type('text');
		$this->addField('keywords')->Title('META Keywords')->Type('text');
		$this->addField('description')->Title('META Description')->Type('text');

		$templates = array();
		$fpath = CORE.app()->config->param("template/dir");
		if ($handle = opendir($fpath)) {
			$tmp = array();
			while (false !== ($filename = readdir($handle))) {
				if (is_file($fpath."/".$filename)) {
					$tmp[] = $filename;
				}
			}
			closedir($handle);
			sort($tmp);
			foreach ($tmp as $j => $i) {
				$templates[$i] = $i;
			}
		}
		$this->addField('template')->Title('Шаблон')->Type('select')->Options($templates)->DefaultValue(app()->config->param("template/default"));

		$this->addField('module')->Title('Вызов модуля')->Type('select')->Options(app()->config->param('modules'));

		$this->getParentOptions();
		$this->addField('parent_id')->Title('Принадлежит странице')->Type('select')->Options($this->parent_options);

		$this->addField('text')->Title('Текст')->Type('visual');

		$this->addSort();
		$this->setSc('asc');
	}

	private function getParentOptions($parent_id = 0, $level = 0) {
		$result = app()->db->query('select * from `prefix_object` where `parent_id`='.$parent_id.' and `object_id` <> '.intval($this->id()).' order by `title` asc');
		while ($row = app()->db->fetchAssoc($result)) {
			$this->parent_options[$row['object_id']] = str_pad('', $level*3, '.').$row['title'];
			$this->getParentOptions($row['object_id'], $level+1);
		}
	}

	public function getTree($parent = 0) {
		$output = app()->db->getRows('select * from `prefix_object` where `parent_id`='.$parent);
		if (is_array($output) and count($output)) {
			foreach ($output as $j => $i) {
				$output[$j]['child'] = $this->getTree($i['object_id']);
			}
		}
		return $output;
	}

	public function Move($down = true) {
		/* default move down */
		$result = app()->db->getRow('select * from `prefix_'.$this->table().'` where `parent_id` = '.$this->parent_id.' and `sort` '.($down ? '>' : '<').' '.intval($this->sort).' order by `sort` '.($down ? 'asc' : 'desc').' limit 0, 1');
		if ($result and $result[$this->fieldId()]) {
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($result['sort']).' where `'.$this->fieldId().'`='.intval($this->{$this->fieldId()}));
			app()->db->query('update `prefix_'.$this->table().'` set `sort` = '.intval($this->sort).' where `'.$this->fieldId().'`='.intval($result[$this->fieldId()]));
		}
	}

        public function quickLinks($parent = 0, $level = 1, $href="") {
                $pad = str_pad("", $level * 3, ".");
                $result = app()->db->query("select * from `prefix_object` where `parent_id`=".$parent." order by `title` asc");
                while ($row = app()->db->fetchAssoc($result)) {
                        $tmp = $href."/".$row["name"];
                        $output.= "['".$pad." ".$row["title"]."', '".$tmp."'],";
                        $output.= $this->quickLinks($row["object_id"], $level + 1, $tmp);
                }
                return $output;
        }

        public function create() {
                parent::create();

                $this->setVar('search', addslashes(strip_tags(stripslashes( 
                        htmlspecialchars_decode($_POST['title'] . ' ' . $_POST['text']) ))) );
        }

        public function save() {
                parent::save();

                $this->setVar('search', addslashes(strip_tags(stripslashes( 
                        htmlspecialchars_decode($_POST['title'] . ' ' . $_POST['text']) ))) );
        }


}