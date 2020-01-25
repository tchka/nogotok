		<div class="menu-bar">

			<? foreach (Catalog::make()->findAll(array('order' => '`sort` asc')) as $el) : ?>
				<a href="<?= $el->href() ?>" class="item">
					<img src="<?= $el->image() ?>">
					<span class="txt">
						<b><?= $el->title ?></b>
					</span>
				</a>
			<? endforeach; ?>

		</div>


