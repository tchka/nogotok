<?
	$site_url = $_SERVER['HTTP_HOST'];
	$site_prot = $_SERVER['HTTP_X_FORWARDED_PROTO'];
	$path = '/stati/';
if (is_array($data)) {
	foreach ($data as $el) {
		?>
		<url>
			<loc><?= $site_prot . '://' . $site_url . $path . $el->name ?></loc>
		</url>
		<?
	}
}

