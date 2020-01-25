<?php

namespace Catalog;

use Catalog as Model;

use Kernel\DB;
use Kernel\Template;
use Kernel\Navigation;

class Index extends \Kernel\DefaultModule {
	const TPL_DIR = 'module/catalog/tpl/';

	protected $item;

	protected $page = 1;
	protected $page_size = 10;

	public function run() {

		if (count($this->object_uri)) {

			$this->item = Model::make()->findByAttributes(array(
				'name' => $this->object_uri[0],
			));

			if (!$this->item->id()) {
				app()->error404();
			}

			$this->object_uri = array_slice($this->object_uri, 1);

			if (count($this->object_uri) == 1 and substr($this->object_uri[0], 0, 4) == 'page' and is_numeric(substr($this->object_uri[0], 4))) {
				$this->page = intval( substr($this->object_uri[0], 4) );
				$this->object_uri = array_slice($this->object_uri, 1);
			}

		}

		if (count($this->object_uri)) {
			app()->error404();
		}

		if ($this->item) {
			return $this->showItem();
		}
		else {
			return $this->showIndex();
			app()->error404();
		}

	}

	public function showItem() {
		app()->canonical( $this->item->href() );

		app()->breadcrumb->push(obj()->title, obj()->href());
		app()->breadcrumb->push($this->item->title);

		$tpl = new \Kernel\Template();

        if ($_GET['page']) {
        	$this->page = intval( $_GET['page'] );
        }
		$docs = \Docs::make()->findAllByAttributes(
			array('catalog_id' => $this->item->id()),
			array('order' => '`sort` asc')
		);
		$paginator = new Navigation($this->page, count($docs), $this->page_size, $this->item->href(), '/page');

		$tpl->setVar('item', $this->item);
		$docs = $paginator->slice($docs);
		$tpl->setVar('docs', $docs);
		$tpl->setVar('paginator', $paginator);

		app()->template->setVars(array(
			'meta_title' => htmlspecialchars_decode($this->item->meta_title() ? $this->item->meta_title() : $this->item->title),
			'meta_keywords' => $this->item->meta_keyw(),
			'meta_description' => $this->item->meta_descr(),

			'title' => $this->item->title . ',',

			'text' => $tpl->parse(self::TPL_DIR . 'item.php'),
		));
	}

	public function showIndex() {

		$tpl = new \Kernel\Template();

        if ($_GET['page']) {
        	$this->page = intval( $_GET['page'] );
        }

		$paginator = new Navigation($this->page, count($items), $this->page_size, $this_href, $page_href);

		$items = Model::make()->findAll( array('order' => '`sort`') );
		$items = $paginator->slice($items);

		if (app()->isAjax()) {
			$g = new Gateway('json');

			$output = '';

			if (count($items)) {
		        foreach ($items as $el) {
		            $output.= \Kernel\Template::fast(
		                'module/catalog/tpl/element.php',
		                array(
		                    'item' => $el
		                )
		            );
		        }
			}
			elseif ($paginator->isFirstPage()) {
				$output.= Template::fast('module/catalog/tpl/element-notfound.php');
			}

			$g->setVar('content', $output);

	        $g->setVar('paginator', $paginator->renderTemplate('module/catalog/tpl/pages.php'));
	        $g->setVar('pages', $paginator->renderTemplate('module/catalog/tpl/paginator-pages.php'));

	        $g->setVar('is_last_page', intval($paginator->isLastPage()));

			app()->ajaxResponse( $g );
		}
		else {
			$tpl->setVar('items', $items);

			$tpl->setVar('paginator', $paginator);
			$tpl->setVar('paginator_tpl', 'pages');

			$tpl->setVar('docs', \Docs::make()->findAll( array('order' => '`sort` asc') ));

			app()->template->setVar('text', $tpl->parse(self::TPL_DIR . 'list.php'));
		}

	}

}