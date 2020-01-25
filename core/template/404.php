<? if (!user()->id()) { 

	include('template/auth.php');

} else {
?>

	<!DOCTYPE html>
	<html lang="ru">

	<head>
		<title>Страница не найдена</title>

		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="/assets/favicon.png" type="image/png">

		<link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css">
		<link rel="stylesheet" href="/assets/css/fontawesome.css" type="text/css">
		
		<link rel="stylesheet" href="/assets/css/style.css" type="text/css">

	</head>


	<body class="err404">
		<div class="err404_content">
		
			<header>
				<div class="col col-logo">
					<a href="/">
						<img src="/assets/images/logo-top-2x.png" alt="" >
					</a>
				</div>
				<div class="col_wrap  col-user" >
					<div class="col" >
						<div class="user"><?= user()->name ?></div>
						<div><a href="/logout" class="logout">Выход</a></div>
					</div>
				</div>
				<div class="col_wrap col-phone" >
					<div class="col">
						<a href="tel:<?= aTel(app()->config->get('phone')) ?>" class="phone"><?= app()->config->get('phone') ?></a><br>
						<a href="tel:<?= aTel(app()->config->get('whatsapp')) ?>" class="regim">Пн-пт с 9 до 19</a>
					</div>
				</div>
				<div class="col_wrap col-www" >
					<div class="col">
						<a href="https://drygo.ru/" target="_blank" class="www">drygo.ru</a>
						<a href="tel:<?= aTel(app()->config->get('whatsapp')) ?>" class="email">fr@drygo.ru</a>
					</div>
				</div>
				<div class="col_wrap col-search" >
					<div class="col">
						<i aria-hidden="true" class="fas fa-search ico-search jSearch"></i>
					</div>
				</div>
				<div class="search jSearchForm">
					<form action="/search" method="post">
						<input type="text" placeholder="Что вы ищете?" name="search">
						<div class="close-button">
							<i class="fas fa-times"></i>
						</div>
					</form>
				</div>

			</header>

			<div class="error404">
				<h2>404</h2>
				<div class="text">
					Страница устарела, была удалена или не существовала.<br>
					Вернуться <a href="/">на главную</a>.
				</div>
			</div>
			
			<div class="clearfloat"></div>
			<div class="empty"></div>
		</div>


		<footer class="err404_footer">
				<div class="flex-elem">
					<div class="col1">
						<p>
							Dry&Go - База Знаний
						</p>
					</div>

					<div class="col2">
						<p>Все необходимые материалы для запуска и ведения бизнеса по франшизе баров укладок Dry&Go </p>
					</div>
				</div>

		</footer>
	</div>
	<!-- <script src="/assets/js/jquery-3.3.1.min.js"></script> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
	<script src="/assets/js/jquery.maskedinput.js"></script>
	<script src="/assets/js/jquery.pajinate.js"></script>
	<script src="/assets/js/app.js?<?= $cssjs ?>"></script>

	</body>
	</html>
<? } ?>