<?php
namespace Kernel;
class Admin {
    protected static $instance;

    private function __construct() {
    	app();
    }

    private function __clone() { }
    private function __wakeup() { }
    public static function getInstance() {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function end() { app()->end(); }

	public function run() {
		if ($_GET['user'] == 'logout') {
			user()->Logout();
			Redirect::Admin();
		}

		if (!user()->isAdmin()) {
			return $this->authorize();
		}
		$tpl = new Template();

		$tpl->setVar('domain', app()->config->param('domain'));
		$tpl->setVar('login', user()->login);

		$module = strlen($_GET['module']) ? $_GET['module'] : 'object';
		$classname = '\\Admin\\'.$module.'\\'.(strlen($_GET['controller']) ? $_GET['controller'] : 'Index');

		$current = new $classname ();

		$tpl->setVars( $current->generate() );
		print $tpl->parse('template/admin/index.php');
	}

	public function gate() {
		if ($_GET['user'] == 'logout') {
			$gate = new Gateway($data_type);
			$gate->add_error("Доступ запрещен.");
			$gate->print_data();
			exit;
		}

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

		$module_name = '\\'.$module.'\\Admin\\Gateway';

		$gate = new $module_name ($data_type);
        if (method_exists($gate, $action)) {
        	$gate->action_return = $gate -> $action();
        }
        else $gate -> add_error("Ошибка создания ".$module." -&gt; ".$action);

		$gate -> print_data();
	}

	public function authorize() {
		$tpl = new Template();

		if (user()->hasError()) {
			$tpl->setVar('error', user()->getError());
		}

		print $tpl->parse('template/admin/authorize.php');
	}
}