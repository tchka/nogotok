<?php
namespace Admin;
class Visual {
	private $name = 'text';
	private $value = '';
	private $height = '400';

	public function __construct($name) {
		$this->name = $name;
	}

	public function setValue($val) {
		$this->value = htmlspecialchars_decode($val);
	}

	public function setConfig($a, $b) {
		$this->$a = $b;
	}

	public function render() {
		$ckeditor = new \CKEditor();
		$ckeditor->basePath = 'ckeditor/';
		$ckeditor->returnOutput = true;
		\CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');

		$conf = array('height' => $this->height.'px');
		if ($this->contents_css) {
			$conf['contentsCss'] = $this->contents_css;
		}

		$output = $ckeditor->editor($this->name, $this->value, $conf);

		if ($this->width) {
			$output.= '<style> .cke_editor iframe { max-width: '.($this->width+20).'px !important; } </style>';
		}

		return $output;
	}

}