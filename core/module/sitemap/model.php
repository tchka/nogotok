<?php

class Sitemap extends \Kernel\defaultObject {
	public function __construct($id) {
		parent::__construct($id, 'object', 'object_id');
	}
}

class Catalog_map extends \Kernel\defaultObject {
	public function __construct($id) {
		parent::__construct($id, 'catalog', 'catalog_id');
	}
}

class Blog_map extends \Kernel\defaultObject {
	public function __construct($id) {
		parent::__construct($id, 'blog', 'blog_id');
	}
}

class Author_map extends \Kernel\defaultObject {
	public function __construct($id) {
		parent::__construct($id, 'author', 'author_id');
	}
}

class Price_map extends \Kernel\defaultObject {
	public function __construct($id) {
		parent::__construct($id, 'price', 'price_id');
	}
}