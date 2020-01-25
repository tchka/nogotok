<? if (count($docs)): ?>

	<? for ($j = 0; $j < count($docs); $j++): ?>

		<div class="standard flex-elem">
				<div class="standard-icon"><img src="/files/type/<?= $docs[$j]->icon() ?>" alt="" >
				</div>
				<div class="standard-content flex-elem">
					<div class="title">
						<h5><?= $docs[$j]->title ?></h5>
						<p><?= $docs[$j]->text ?></p>
					</div>
					<div class="details flex-elem">
						<div class="change">
							Изменение:  <?= date('d.m.Y', $docs[$j]->date) ?>
						</div>
						<div class="type">
							<i aria-hidden="true" class="far fa-file-alt"></i>
							<span><?= $docs[$j]->type() ?></span>
						</div>
						<div class="link flex-elem">
							<div class="button-wrap">
								<a href="<?= $docs[$j]->link ?>" class="button">
									<i class="fas fa-file-download"></i>
									<span class="elementor-button-text">Подробнее</span>
								</a>
							</div>
						</div>
					</div>
				</div>

		</div>

	<? endfor; ?>

<? endif; ?>

