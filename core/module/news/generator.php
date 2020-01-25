<?php
namespace News;
class Generator {
	private $result;
	private $row;

	private $object_id;

	public function __construct($object_id) {
		$this->object_id = $object_id;
	}

	public function run() {
		$tpl = new \Kernel\Template();
		$tpl->setVar(
			'news', 
			app()->db->getRows('select * from 
				`prefix_news` as n left join 
				`prefix_news_visible` as v using (`news_id`)
				where v.`object_id`='.intval($this->object_id).'
				order by n.`sort` asc
				'));
		return $tpl->parse('module/news/tpl/news.php');
	}

}
