<?php
namespace Kernel;
class Template {
	private $_config = array();
	private $_vars = array();

	public function __construct() {
	}

	public function setVar($j, $i) {
		$this->_vars[$j] = $i;
	}

	public function setVars($arr) {
		if (is_array($arr)) {
			foreach ($arr as $j => $i) {
				$this->_vars[$j] = $i;
			}
		}
	}

	public function parse($fname, $prefix = null) {
		if (strpos($fname, '../..') !== false) return false;

		if ($fname[0] != '/') $fname = '/'.$fname;
		$filename = CORE.$fname;

		if (!file_exists($filename)) return 'Template `'.$fname.'` does not exists.';

		foreach ($this->_vars as $j => $i) ${$j} = $i;

		ob_start();
		include($filename);
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	public static function fast($fname, $params = array()) {
		$t = new Template();
		$t->setVars($params);
		return $t->parse($fname, $prefix);
	}

}