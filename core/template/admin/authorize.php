<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <title>Вход</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <link rel="stylesheet" href="css/authorize.css" type="text/css" />

  <script type="text/javascript" src="/js/jquery.js"></script>

</head>

<body>

<div class="login" >
	<h1>Вход</h1>

	<? if (strlen($error)): ?>
		<div class="login-error"><?=$error;?></div>
	<? endif; //error ?>

	<form action="" method="post">
		<input type="hidden" name="form_id" value="authorize" />

		<input name="login" type="text" value="<?=$login?>" class="inputbox" placeholder="Логин" />
		<input name="password" type="password" value="" class="inputbox" placeholder="Пароль" />

		<input type="submit" name="submit" class="button" value="Войти" />
	</form>
</div>

</body>

</html>