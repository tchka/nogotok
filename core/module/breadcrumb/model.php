<?php

class Breadcrumb {
	private $data = array();

	public function __construct() {
	}

	public function push( $title, $href = '' ) {
		if (is_array($title)) {
			$this->data[] = $title;
		}
		else {
			$this->data[] = array(
				'title' => $title,
				'href' => $href
			);
		}

		return $this;
	}

	public function first( $title, $href = '' ) {
		if (is_array($title)) {
			array_unshift($this->data, $title);
		}
		else {
			array_unshift($this->data,
				array(
					'title' => $title,
					'href' => $href
				)
			);
		}

		return $this;
	}

	public function render( $tpl_name = '' ) {
		$tpl = new \Kernel\Template();
		$tpl->setVar('data', $this->data);
		return $tpl->parse( $tpl_name ? $tpl_name : 'module/breadcrumb/tpl/default.php' );
	}

}