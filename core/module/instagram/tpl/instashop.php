<?

if (is_array($data)) {
	foreach ($data as $el) {
		?>
			<a href="<?= $el->url ?>" target="_blank" class="item">
				<img src="<?= $el->thumb() ?>">
			</a>
		<?
	}
}

