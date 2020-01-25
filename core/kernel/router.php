<?php

namespace Kernel;

class Router {
	private $uri;

	public $object;
	private $object_uri = array();

	private $template_name = '';

	public function __construct($uri) {
		$uri = trim($uri);
		if ($uri[strlen($uri)-1] == '/') $uri = substr($uri, 0, -1);
		if ($uri[0] == '/') $uri = substr($uri, 1);
		$this->uri = $uri;

		$parts = explode('/', $this->uri);
		$parent_id = 0;

		foreach ($parts as $j => $i) {
			$row = app()->db->getRow('select * from `prefix_object` where `parent_id` = '.$parent_id.' and `name` like "'.$i.'"');
			if ($row) {
				$this->object = new \Object($row);
				$this->object_uri = array_slice($parts, $j+1);
				$parent_id = $this->object->id();
			} else {
				break;
			}
		}

		if (!$this->object) {
			app()->error404();
		}
	}

	public function run() {

      		if (!user()->id()) {
            		return $this->auth();
       	}

		if (!$this->object->module and count($this->object_uri) > 0) {
			app()->error404();
		}

		$menu = new \Menu\Generator('main');
		$news = new \news\Generator($this->object->id());

		app()->template->setVars(array(
			'meta_title' => ($this->object->metatitle ? $this->object->metatitle : $this->object->title),
			'meta_keywords' => $this->object->keywords,
			'meta_description' => $this->object->description,

			'title' => $this->object->title,
			'text' => htmlspecialchars_decode($this->object->text),	

			'indexpart' => htmlspecialchars_decode($this->object->extra),	

			'menu' => $menu->run(),

			'news' => $news->run(),
			));

		if ($this->object->module) {
			$module_name = str_replace('|', '\\', $this->object->module);

			$app = new $module_name ( $this->object, $this->object_uri );
			$app->run();
		}
	}

	public function getTemplate() {
		return $this->template_name ? $this->template_name : $this->object->template;
	}

	public function setTemplate( $tpl_name ) {
		$this->template_name = $tpl_name;
	}

	private function auth() {
       	$this->template_name = 'auth.php';
	}


}