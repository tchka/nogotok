<?
	$site_url = $_SERVER['HTTP_HOST'] . '/';
	$site_prot = $_SERVER['HTTP_X_FORWARDED_PROTO'];

if (is_array($data)) {
	foreach ($data as $el) {
		?>
		<url>
			<loc><?= $site_prot . '://' . $site_url . $el->name ?></loc>
			<? 	if ($el->object_id == 1) { ?>
				<changefreq>daily</changefreq>
				<priority>1.0</priority>
				<lastmod><?= date("Y-m-d")?></lastmod>
			<? } ?>
		</url>
		<?
	}
}

