<?
namespace Docs\Admin;

use Docs as Model;

class Gateway extends \Kernel\Gateway {

	public function sort() {
		$r = array();
		$s = intval($_GET['sort']);
		$r = array();

		foreach (Model::make()->findAll(array('order' => 'sort asc')) as $j => $el) {
			if ($el->sort >= $s) {
				$el->setVar('sort', $el->sort+1);
			}
		}

		$m = Model::make( $_GET['id'] );
		$m->setVar('sort', $s);

		foreach (Model::make()->findAll(array('order' => 'sort asc')) as $j => $el) {
			$el->setVar('sort', $j+1);
			$r[ $el->id() ] = $j+1;
		}

		$this->setVar('result', $r);
	}

}