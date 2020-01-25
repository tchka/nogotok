
<? foreach ($items as $el): ?>

	<div class="learn flex-elem">
		<div class="image">
			<a href="/learn/<?= $el->name ?>">
				<img src="<?= $el->thumb() ?>" alt="" >
			</a>
		</div>
		<div class="text">
			<h3>
				<a href="/learn/<?= $el->name ?>"><?= $el->title ?></a>
			</h3>
			<div class="change">
				<i aria-hidden="true" class="far fa-clock"></i>
				<?= date('d.m.Y', $el->date) ?></div>
			<div class="anons">
				<a href="/learn/<?= $el->name ?>">
					<?= $el->announce ?>
				</a>
			</div>
		</div>
	</div>

<? endforeach; ?>

<div id="jPages">
	<?= $paginator ? $paginator->renderTemplate('module/catalog/tpl/pages.php') : '' ?>
</div>

