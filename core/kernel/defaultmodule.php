<?php
namespace Kernel;
class defaultModule {
	protected $object;
	protected $object_uri;

	public function __construct( $object, $object_uri ) {
		$this->object = $object;
		$this->object_uri = $object_uri;

		if (method_exists($this, 'route')) {
			$this->route();
		}
	}

}