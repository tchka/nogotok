<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Панель администрирования</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <link rel="stylesheet" href="css/style.css" type="text/css">
  <!–-[if IE 7]><link rel="stylesheet" href="css/ie7.css" type="text/css" /><![endif]–->

  <link rel="stylesheet" href="css/glyphicon.css" type="text/css">

  <script language="Javascript" type="text/javascript" src="/js/jquery.js"></script>
  <script language="Javascript" type="text/javascript" src="js/functions.js"></script>

  <script language="javascript" type="text/javascript">
  var open_category = 0;

  $(function(){
  	$(".faq_category").click(function(){
  		$(".faq_category").css("text-decoration", "underline");
  		$(this).css("text-decoration", "none");

  		var id = $(this).attr('rel');
  		$(".faq_category_layer").css("display", "none");
  		$("#cat" + id).css("display", "block");
  	});

  	if (open_category) {
  		$("#cl" + open_category).css("text-decoration", "none");
  		$("#cat" + open_category).css("display", "block");
  	}
  });


  var quick_links = [
	[ '', '' ],
	<?
	$obj = new \Object\Admin();
	print $obj->quickLinks();
	?>
  ];

  </script>

</head>
<body>

  <div id="head">
    <div id="title">
      Панель управления
      <div id="userinfo">Вы вошли как <b><?=$login?></b>. <a href="?user=logout">Выход</a></div>
    </div>

    <div class="menu">
      <ul>
        <li><span><b class="glyphicon glyphicon-th-list"></b> <a href="?module=object">Контент</a></span>
          <ul>
            <li><a href="?module=object">Структура сайта</a></li>
            <li><a href="?module=catalog">Стандарты</a></li>
            <li><a href="?module=docs">Документы</a></li>
            <li><a href="?module=type">Типы документов</a></li>
            <li><a href="?module=blog">Новости</a></li>
            <li><a href="?module=learn">Обучение</a></li>
          </ul>
        </li>
        <li><span><b class="glyphicon glyphicon-user"></b> <a href="?module=user">Пользователи</a></span>
          <ul>
            <li><a href="?module=user">Пользователи</a></li>
          </ul>
        </li>
        <li><span><b class="glyphicon glyphicon-cog"></b> <a href="">Прочее</a></span>
          <ul>
            <li><a href="?module=settings">Настройки</a></li>
            <?
            $menu = app()->config->param('menu');
            foreach ($menu as $j => $i){
            	print '<li><a href="?module=menu&type='.$j.'">'.$i['title'].'</a></li>';
            }
            ?>
            <li class="spacer"><a href="?">На главную</a></li>
            <li><a href="http://<?=$domain?>/" target="_blank">Открыть сайт</a></li>
            <li><a href="?user=logout">Выход</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

  <div class="path">
    <?=$path?>
  </div>

	<table border="0" cellspacing="0" cellpadding="0" width="100%" height="500px"><tr><td valign="top" class="content">
		<h1><?=$legend?></h1>
		<div id="data-status">
			<?
			if ($_SESSION['message_success']) {
				print '<div class="done">'.$_SESSION['message_success'].'</div>';
				unset($_SESSION['message_success']);
			}
			?>
		</div>
		<div id="data-content">
			<?=$output?>
		</div>
	</td></tr></table>

	<div id="copyright-spacer"></div>

	<script language="Javascript" type="text/javascript" src="js/app.js"></script>

</body>
</html>