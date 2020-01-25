<h2><?= $item->title ?></h2>

<div class="content">
	<?= htmlspecialchars_decode( $item->text ) ?>
</div>

<div id="jCatalog">
	<?= $this->parse('module/docs/tpl/slider.php') ?>
</div>

<div id="jPages">
	<?= $paginator ? $paginator->renderTemplate('module/catalog/tpl/pages.php') : '' ?>
</div>