<? if (count($data)): ?>
	<div class="breadcrumbs">
		<ul>
			
			<li><a href="/">Главная</a></li>

			<? foreach ($data as $j => $i): ?>
				<? if ($i['href'] and count($data) > $j+1): ?>
					<li>
						<a href="<?= $i['href'] ?>"><?= $i['title'] ?></a>
					</li>
				<? else: ?>
					<li>
						<?= $i['title'] ?>
					</li>
				<? endif; ?>
			<? endforeach; ?>

		</ul>
	</div>
<? endif; ?>
