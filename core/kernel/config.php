<?php

namespace Kernel;
class Config {
	private $config;

	public function __construct() {
		global $config;
		$this->config = $config;
	}

	public function db() {
		return $this->config['db'];
	}

	public function param($v) {
		$out = $this->config;
		$a = explode('/', $v);
		foreach ($a as $j => $i) {
			if (is_array($out)) {
				$out = $out[$i];
			} else {
				return null;
			}
		}
		return $out;
	}

	public function get($var) {
		return app()->db->getVar('select `value` from `prefix_config` where `config_id`="'.htmlspecialchars($var).'"');
	}

}