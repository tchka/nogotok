<?php

namespace Blog;

use Blog as Model;

use Kernel\DB;
use Kernel\Template;
use Kernel\Navigation;

class Index extends \Kernel\DefaultModule {
	const TPL_DIR = 'module/blog/tpl/';

	protected $item;

	protected $page = 1;
	protected $page_size = 10;

	public function run() {

		app()->breadcrumb->push(obj()->title, obj()->href());
		if (count($this->object_uri)) {


			if (count($this->object_uri) == 1 and substr($this->object_uri[0], 0, 4) == 'page' and is_numeric(substr($this->object_uri[0], 4))) {
				$this->page = intval( substr($this->object_uri[0], 4) );
			} else {
			
				$this->item = Model::make()->findByAttributes(array(
					'name' => $this->object_uri[0],
				));

				if (!$this->item->id()) {
					app()->error404();
				}
			
			}

		}
		
		$this->object_uri = array_slice($this->object_uri, 1);

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

		app()->breadcrumb->push($this->item->title);

		$tpl = new \Kernel\Template();
		$tpl->setVar('item', $this->item);

		app()->template->setVars(array(
			'meta_title' => htmlspecialchars_decode($this->item->meta_title() ? $this->item->meta_title() : $this->item->title),
			'meta_keywords' => $this->item->meta_keyw(),
			'meta_description' => $this->item->meta_descr(),

			'title' => $this->item->title,

			'text' => $tpl->parse(self::TPL_DIR . 'item.php'),
		));
	}

	public function showIndex() {
		app()->canonical( '/news' );

		$tpl = new \Kernel\Template();

        if ($_GET['page']) {
        	$this->page = intval( $_GET['page'] );
        }


		$items = Model::make()->findAllByAttributes( array('active' => 1), array('order' => '`date` desc') );
		$paginator = new Navigation($this->page, count($items), $this->page_size , '/news' , '/page');
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

			app()->template->setVar('text', $tpl->parse(self::TPL_DIR . 'list.php'));
		}

	}

	public static function sitemap() {
		/*$href = app()->config->param('url');
		$data = array();

		foreach (\Catalog\Category::make()->findAll(array('order' => 'parent_id asc, category_id asc')) as $el) {
			$data[] = array('loc' => $href . $el->href());
		}

		foreach (\Catalog\Item::make()->findAll(array('order' => 'sort asc')) as $el) {
			$data[] = array('loc' => $href . $el->fullHref());
		}

		return $data;*/
	}

}