<header>

	<div id="header-top">
		<?php 
		if ($_SESSION['auth'] == 'yes_auth') {
			echo '<p id="auth-user-info" align="right" >Здравствуйте, '.$_SESSION['auth_name'].'!<a id="logout">Выйти</a></p>';
		} else {
			echo '<p id="reg-auth-title" align="right">
			<a class="top-auth">Вход</a>
			<a class="top-reg" href="registration.php">Регистрация</a>	
		</p>';
		}
		?>
		

		<div id="block-top-auth">
			<form method="post">
				<ul id="input-email-pass">
					<h3>Вход</h3>
					<p id="message-auth">Неверный логин и(или) Пароль</p>
					<li><center><input type="text" id="auth_login" placeholder="Логин"></center></li>
					<li><center><input type="password" id="auth_pass" placeholder="Пароль"></center></li>
					<p align="right" id="button-auth"><a>Войти</a></p>
				</ul>
			</form>
		</div>
	</div>

<a href="index.php"><img id="img-logo" src="/images/logo.jpg"></a>

<div id="block-search">
	<form method="GET" action="search.php?q=">
		<input type="text" id="input-search" name="q" placeholder="Поиск товаров..." value="<?php echo $search;?>">
		<input type="submit" id="button-search" value="Поиск">
	</form>	
</div>
<!-- top-menu -->
<nav>
	<ul>
		<li><a href="index.php">Главная</a></li>
		<li><a href="about.php">О компании</a></li>
		<li><a href="contacts.php">Контакты</a></li>
		<li><a href="delivery.php">Доставка</a></li>
		<li><a href="pay.php">Оплата</a></li>
	</ul>

<p align="right" id="block-basket"><b id="simvol_korzina">&#128722 </b><a href="cart.php?action=oneclick"></a></p>
</nav>

</header>