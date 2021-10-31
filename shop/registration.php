<?php
	include("include/db_connect.php");
	session_start();
	
	if(isset($_POST["reg_submit"])){
	
	if(!empty($_POST['reg_name']) && !empty($_POST['reg_email']) && !empty($_POST['reg_login']) && !empty($_POST['reg_pass'])) {

  $login= htmlspecialchars($_POST['reg_login']);
  $pass=htmlspecialchars($_POST['reg_pass']);
  $surname=htmlspecialchars($_POST['reg_surname']);

  $name=htmlspecialchars($_POST['reg_name']);
  $patronymic=htmlspecialchars($_POST['reg_patronymic']);
  $email=htmlspecialchars($_POST['reg_email']);

  $phone=htmlspecialchars($_POST['reg_phone']);
  $address=htmlspecialchars($_POST['reg_address']);
  $ip = $_SERVER['REMOTE_ADDR'];

$query=mysqli_query($link,"SELECT * FROM reg_user WHERE login='".$login."'") ;
  $numrows=mysqli_num_rows($query);
if($numrows==0)
   {
	$sql="INSERT INTO reg_user (login,pass, surname, name, patronymic, email, phone, address, datetime, ip) VALUES('".$login."','".$pass."','".$surname."', '".$name."','".$patronymic."','".$email."','".$phone."','".$address."',NOW(),'".$ip."')";
  $result=mysqli_query($link,$sql);
 if($result){
	$message = "Аккаунт успешно создан";
} else {
 $message = "Ошибка! Попробуйте позже";
  }
	} else {
	$message = "Этот логин уже существует!";
   }
	} else {
	$message = "Нужно заполнить все поля!";
	}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

<div id="main">
<?php
	include("include/header.php");
?>

<aside>
<?php
	include("include/block-category.php");
?>
</aside>



<div id="content">
	<h2 class="h2-title">Регистрация</h2>
	<form method="post" id="form_reg">
		<p id="reg_message"></p>
		<div id="block-form-registration">
			<ul id="form-registration">
				<li>
					<label>Логин</label>
					<input type="text" name="reg_login" id="reg_login">
				</li>
				<li>
					<label>Пароль</label>
					<input type="text" name="reg_pass" id="reg_pass">
				</li>
				<li>
					<label>Фамилия</label>
					<input type="text" name="reg_surname" id="reg_surname">
				</li>
				<li>
					<label>Имя</label>
					<input type="text" name="reg_name" id="reg_name">
				</li>
				<li>
					<label>Отчество</label>
					<input type="text" name="reg_patronymic" id="reg_patronymic">
				</li>
				<li>
					<label>E-mail</label>
					<input type="text" name="reg_email" id="reg_email">
				</li>		
				<li>
					<label>Мобильный телефон</label>
					<input type="text" name="reg_phone" id="reg_phone">
				</li>	
				<li>
					<label>Адрес доставки</label>
					<input type="text" name="reg_address" id="reg_address">
				</li>
			</ul>
		</div>
		<?php	
			if (!empty($message)) {echo "<p class=error>". $message . "</p>";}
			?>
		<p align="right">
			
			

			<input type="submit" name="reg_submit" id="form_submit" value="Регистрация">
		</p>
	</form>
</div>

<?php
	include("include/footer.php");
?>

</div>