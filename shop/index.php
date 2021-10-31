<?php
	include("include/db_connect.php");
	
	session_start();
	$array = array(
		"Гитары", 
		"Клавишные инструменты", 
		"Ударные инструменты", 
		"Духовые инструменты", 
		"Народные инструменты ", 
		"Струнные инструменты");

	$types = array(
		"guitar", 
		"piano", 
		"percussion", 
		"vent", 
		"folk", 
		"stringed");
	$i = 0;
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


<div id="main-content">
	<ul id="block-main-content">
<?php	
// Вывод товаров
do {
			echo '<li><p>'.$array[$i].'</p>
			<ul>';	
		$result = mysqli_query($link,'SELECT * FROM category WHERE type="'.$types[$i].'"');

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);

			do {
				echo '
				<li><a href="view_cat.php?cat='.$row["brand"].'&type='.$row["type"].'">'.$row["brand"].'</a></li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}			
		echo '</ul></li>';
		$i++;
} while ($i < 6);
	?>


	</ul>
</div>

<?php
	include("include/footer.php");
?>

</div>