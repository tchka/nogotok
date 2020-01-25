<?
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Войти в Базу Знаний — Dry&amp;Go</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="/assets/favicon.png" type="image/png">

	<link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="/assets/css/fontawesome.css" type="text/css">
	
	<link rel="stylesheet" href="/assets/css/style.css" type="text/css">

</head>


<body>
	<div class="login-wrapper  flex-elem">
		<div class="login container">

			<div class="form-wrapper">
			
			
				<div class="image">
					<img width="410" height="248" src="http://drygo.bizowner.ru/wp-content/uploads/2019/04/logo-top-2x.png" class="attachment-large size-large" alt="" srcset="http://drygo.bizowner.ru/wp-content/uploads/2019/04/logo-top-2x.png 410w, http://drygo.bizowner.ru/wp-content/uploads/2019/04/logo-top-2x-300x181.png 300w" sizes="(max-width: 410px) 100vw, 410px">	
				</div>
				<h2>Приветствуем Вас в Базе Знаний Dry&amp;Go</h2>
				
				<div id="loginForm" class="loginform">

					<div class="field">
						<input type="text" class="flogin" placeholder="E-mail">
					</div>

					<div class="field">
						<input type="password" class="fpassword" placeholder="Пароль">
					</div>

					<div class="error"></div>

					<span class="btn">Войти</span>


				</div>
				
				
			</form>
			</div>
		
		</div>

	</div>

<!-- <script src="/assets/js/jquery-3.3.1.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
<script src="/assets/js/jquery.maskedinput.js"></script>
<script src="/assets/js/jquery.pajinate.js"></script>
<script src="/assets/js/app.js?<?= $cssjs ?>"></script>
<script type="text/javascript">
$(function(){
	$('#loginForm .btn').click(function(){
		var el = $('#loginForm');

		$('.error', el).html('');

		$.post(
			'/gateway.php',
			{
				'module': 'user',
				'action': 'login',
				'data_type': 'json',
				'login': $('.flogin', el).val(),
				'password': $('.fpassword', el).val(),
			},
			function(data){
				if (data.success) {
//					document.location.href = document.location.href;
					$('.error', el).html('ok');
				}
				else {
					$('.error', el).html('no');
				}
			},
			'json'
		);

	});

});
</script>
</body>
</html>