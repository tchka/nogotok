<!DOCTYPE html>
<html lang="ru">

<head>
	<?= $this->parse('../template/include/head.php') ?>
</head>

<body>

	<?= $this->parse('../template/include/header.php') ?>


		<h2>Информация по работе с системой</h2>
		<div class="row flex-elem">
			<div class="main-info-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="main-info">
					<h3>Добро пожаловать в базу знаний Dry&amp;GO</h3>
					<p>Информация по работе с базой знаний "Dry&amp;Go"</p>
					<a href="/dobro-pozhalovat-v-bazu-znanij-dry-go" class="button">Перейти</a>	
				</div>
			</div>
			<div class="main-info-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="main-info">
					<h3>Гайд по работе с системой стандартов Dry&amp;GO</h3>
					<p>Информация по работе с базой знаний "Dry&amp;Go"</p>
					<a href="/gajd-po-rabote-s-sistemoj-standartov-dry-go" class="button">Перейти</a>	
				</div>
			</div>
			<div class="main-info-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="main-info">
					<h3>Список контактов ответственных лиц</h3>
					<p>Информация по работе с базой знаний "Dry&amp;Go"</p>
					<a href="/spisok-kontaktov" class="button">Перейти</a>	
				</div>
			</div>
		</div>
		<h2 class="news-title">Последние новости</h2>
		<div class="news-link"><a href="/news" >Все новости</a></div>
		<?
			$news = \Blog::make()->
				findAllByAttributes( 
					array('active' => 1),
					array('order' => '`date` desc', 'limit' => 3)
				);
		?>
		
		<div class="row">
		
			<? foreach ($news as $el): ?>

				<div class="main-news-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="main-news">
						<p><a href="/news/<?= $el->name ?>"><?= $el->title ?></a></p>
						<p><?= date('d.m.Y', $el->date) ?></p>
					</div>
				</div>

			<? endforeach; ?>

		</div>
		
		<h2>Последние обновления стандартов</h2>
		<?
			$docs = \Docs::make()->findAll(
				array('order' => '`date` desc')
			);

		?>
		<? if (count($docs)): ?>
			<div class="standard-wrapper">

			<div class="standard-list">
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
				</div>
				<div class="paginator"></div>
			</div>

		<? endif; ?>







<?= $this->parse('../template/include/footer.php') ?>
<?= \Sitemap\Index::Sitemap() ?>
</body>
</html>