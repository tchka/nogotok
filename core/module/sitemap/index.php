<?php

namespace Sitemap;

use Sitemap as Model;
use Catalog_map as Model_catalog;
use Blog_map as Model_blog;
use Author_map as Model_author;
use Price_map as Model_price;
use Kernel\Template;


class Index {

	public static function Sitemap() {
		$proc = new self();
		$proc->checkSitemap();

	}

	public function checkSitemap() {
		$last_update = app()->db->getVar('select `value` from `prefix_cache` where `id` like "sitemap_last_update"');

		if (!$last_update or intval($last_update) + app()->config->param('instagram/timeout') < time()) {
			$this->updateSitemap();

		}
	}

	private function updateSitemap() {
		$site_url = $_SERVER['HTTP_HOST'];
		$site_prot = $_SERVER['HTTP_X_FORWARDED_PROTO'];

		$tpl = new Template();
		$tpl->setVar('data', Model::make()->findAll());

		$tpl_cat = new Template();
		$tpl_cat->setVar('data', Model_catalog::make()->findAll());

		$tpl_blog = new Template();
		$tpl_blog->setVar('data', Model_blog::make()->findAll());

		$tpl_author = new Template();
		$tpl_author->setVar('data', Model_author::make()->findAll());

		$tpl_price = new Template();
		$tpl_price->setVar('data', Model_price::make()->findAll());

		$result_str = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 		xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
		$result_str .= $tpl->parse('module/sitemap/tpl/sitemap.php');
		$result_str .= $tpl_cat->parse('module/sitemap/tpl/catalog.php');
		$result_str .= $tpl_blog->parse('module/sitemap/tpl/stati.php');
		$result_str .= $tpl_author->parse('module/sitemap/tpl/author.php');
		$result_str .= $tpl_price->parse('module/sitemap/tpl/price.php');
		$result_str .= '</urlset>';

		@file_put_contents ('sitemap.xml', $result_str);
		app()->db->query('insert into `prefix_cache` (`id`, `value`) values ("sitemap_last_update", "' . time() . '") on duplicate key update `value` = "' . time() . '"');
		@file_put_contents ('sitemap.txt', mysqli_error());

	}

}