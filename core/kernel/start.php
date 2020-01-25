<?php
namespace Kernel;
class Start {
	protected static $instance;

	private $route;

	public $config;
	public $db;
	public $template;

	public $device;

	public $breadcrumb;

	public $_canonical = false;

	private function __construct() {
		$this->config = new Config();
		$this->db = new MySQL($this->config->db());

		$this->breadcrumb = new \Breadcrumb();
	}

	private function __clone() { }
	private function __wakeup() { }
	public static function getInstance() {
		if ( is_null(self::$instance) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function run() {
		list($url, $query) = explode('?', $_SERVER['REQUEST_URI'], 2);

		$this->route = new Router( $url );

		$this->template = new Template();

		$this->route->run();

		print $this->template->parse($this->config->param('template/dir').'/'.$this->route->getTemplate());
	}

	public function gate() {
		$_GET = postFilter($_GET);
		$_POST = postFilter($_POST);

		$module = strlen($_POST['module']) ? $_POST['module'] : $_GET['module'];
		$action = strlen($_POST['action']) ? $_POST['action'] : $_GET['action'];
		$data_type = strlen($_POST['data_type']) ? $_POST['data_type'] : $_GET['data_type'];

		if (strpos($module, '/') !== false) {
			$gate = new Gateway($data_type);
			$gate->add_error("Ошибка загрузки `".$module."`");
			$gate->print_data();
			exit;
		}

		$module_name = '\\'.$module.'\\Gateway';

		$gate = new $module_name ($data_type);
        if (method_exists($gate, $action)) {
        	$gate->action_return = $gate -> $action();
        }
        else $gate -> add_error("Ошибка создания ".$module." -&gt; ".$action);

		$gate -> print_data();
	}

	public function end() {
		$this->db->disconnect();
	}

	public function error404() {
		header('HTTP/1.1 404 Not found');

		$tpl = new \Kernel\Template();
		print $tpl->parse('template/404.php');

		$this->end();
		exit;
	}

	public function error301($url) {
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$url);
		$this->end();
		exit;
	}

	public function redirect($url) {
		header('Location: '.$url);
		print 'Redirect to: <a href="'.$url.'">'.$url.'</a>';
		print '<script type="text/javascript">document.location.href = "'.$url.'";</script>';
		$this->end();
		exit;
	}

	public function canonical($url = null) {
		if (!is_null($url)) {
			if ($url === false or strlen($url) == 0) {
				$this->_canonical = false;
			}
			else {
				$host = $this->config->param('url');

				if (!$host) {
					$host = 'http://' . $this->config->param('domain');
				}

				if (!$host) {
					$host = 'http://' . $_SERVER['HTTP_HOST'];
				}

				$this->_canonical = $host . $url;
			}
		}

		return $this->_canonical;
	}

	public function canonicalHtml() {
		if ($url = $this->canonical()) {
			return '<link rel="canonical" href="'.$url.'">';
		}
	}

	public function getObject() {
		return $this->route->object;
	}

	public function setTemplate( $tpl_name ) {
		$this->route->setTemplate( $tpl_name );
	}

	public function isMobile() {
		return $this->device->isMobile();
	}

	public function isTablet() {
		return $this->device->isTablet();
	}

	public function isAjax() {
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}

	public function ajaxResponse( $g ) {
		if (is_object($g) and method_exists($g, 'print_data')) {
			$g->print_data();
		}
		else {
			$g = new Gateway('json');
			$g->addError('Ошибка загрузки HTTP Request');
			$g->print_data();
		}

		exit;
	}

}
