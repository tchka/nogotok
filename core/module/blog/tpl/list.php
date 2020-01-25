
<? foreach ($items as $el): ?>

	<div class="news">
		<h3>
			<a href="/news/<?= $el->name ?>"><?= $el->title ?></a>
		</h3>
		<div class="change"><?= date('d.m.Y', $el->date) ?></div>
		<div class="anons">
			<?= $el->announce ?>
		</div>
		<div class="more">
			<a href="/news/<?= $el->name ?>">Читать полностью »</a>
		</div>
	</div>

<? endforeach; ?>

<div id="jPages">
	<?= $paginator ? $paginator->renderTemplate('module/catalog/tpl/pages.php') : '' ?>
</div>

