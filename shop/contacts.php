<?php
	include("include/db_connect.php");
	
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Музыкальный интернет-магазин</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div id="main">

<?php
	include("include/header.php");
?>

<div id="contacts-content">
<h1>КОНТАКТЫ</h1>
	<div id="left">
		<p><span>Музыкальный магазин Музыкальная планета (ООО "Музыкальная планета")</span></p>
		<p><span>Электронная почта:</span> store@musicplanet.ru</p>
		<p><span>Телефон:</span> <a href="">8-800-500-78-89</a></p>
		<p><span>Реквизиты на странице</span> <a href="about.php">О нас</a></p>
	</div>
	<div id="right">
		<p>Офис Музыкальная планета в Москве<br>
		г. Москва, Лужнецкая набережная 2/4, строение 26, офис 14 </p>

		<p>Магазин Музыкальная планета в Омске<br>
		г. Омск, ул. Маршала Жукова, 107<br>
		8 (3812) 95-65-30</p>

		<p>Магазин Музыкальная планета в Махачкале<br>
		г. Махачкала, ул. И.Шамиля, 15<br>
		8 (928) 928-92-89<br></p>
	</div>
</div>

<?php
	include("include/footer.php");
?>

</div>