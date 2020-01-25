	<header class="flex-elem">
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
					<span   class="regim"><?= app()->config->get('regim') ?></a>
				</div>
			</div>
			<div class="col_wrap col-www" >
				<div class="col">
					<a href="https://drygo.ru/" target="_blank" class="www"><?= app()->config->get('www') ?></a>
					<a href="mailto:<?= app()->config->get('email') ?>" class="email"><?= app()->config->get('email') ?></a>
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
	<section class="main">
	<div class="left">
		<div class="menu-toggle">
			<i class="fas fa-bars"></i>
		</div>
		<ul class="menu">	
			<?= $menu ?>
				  
			<?/*foreach (Catalog::make()->findAll(array('order' => '`sort` asc')) as $el) : ?>
				<li>
					<a href="<?= $el->href() ?>" class="<? if ( $el->href() == $_SERVER['REQUEST_URI']) { print 'active'; } ?>">
						<?= $el->title ?>
					</a>
				</li>
			<? endforeach; */?>
			
		    <?= \Catalog\Menu::render() ?>
			
		</ul>
	</div>
	<div class="right">

