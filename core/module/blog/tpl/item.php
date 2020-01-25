		<div class="image">
			<img src="<?= $item->thumb() ?>" alt="" >
		</div>
		<div class="change"><?= date('d.m.Y', $item->date) ?></div>

		<div class="content">
			<?= htmlspecialchars_decode($item->text) ?>
		</div>




