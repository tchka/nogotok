<?php
namespace Kernel;
class Redirect {

	public static function URI($uri) {
		if ($uri[0] != "/") $uri = "/".$uri;
		$link = "http://".app()->config->param('domain').$uri;

		header("Location: ".$link);
		print "<html><body><script> document.location.href = '".$link."'</script>Redirect: <a href='".$link."'>".$link."</a></body></html>";
		die();
	}

	public static function URL($url) {
		header("Location: ".$url);
		print "<html><body><script> document.location.href = '".$url."'</script>Redirect: <a href='".$url."'>".$url."</a></body></html>";
		die();
	}

	public static function Admin($uri = '') {
		$link = "http://".app()->config->param('domain').app()->config->param('admin').$uri;
		header("Location: ".$link);
		print "<html><body><script> document.location.href = '".$link."'</script>Redirect: <a href='".$link."'>".$link."</a></body></html>";
		die();
	}

}

