<?php
	include("include/db_connect.php");
	session_start();
	$cat = $_GET["cat"];
	$type = $_GET["type"];
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

<aside>
<?php
	include("include/block-category.php");
?>
</aside>
<div id="content">
	<?php echo '<h1 id="catname">'.$cat.'</h1>
	<ul id="block-tovar-grid">';
	
		$result = mysqli_query($link,"SELECT * FROM table_products WHERE brand='$cat' AND type_tovara='$type'");

		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			do {
				echo '
				<li>
					<p class="style-title-grid">
					<a href="view_content.php?id='.$row["products_id"].'">'.$row ["title"].'</a>
					</p>
					<div class="block-images-grid">
					<a href="view_content.php?id='.$row["products_id"].'"><img class="images" src="/uploads_images/'.$row ["image"].'"></a>
					</div>
					
					<p class="style-price-grid"><strong>'.$row ["price"].'</strong> руб.
					</p><a class="add-cart-style-grid" tid="'.$row["products_id"].'">В корзину</a>
				</li>
				';
			}
			while ($row = mysqli_fetch_array($result)); 
		}
		else {
			echo '<h3>Категория не доступна или не создана!</h3>';
		}
	?>
	</ul>
</div>

<?php
	include("include/footer.php");
?>

</div>