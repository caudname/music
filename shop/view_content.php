<?php
	include("include/db_connect.php");
	session_start();
	$id = $_GET["id"]; 
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
<?php
$result1 = mysqli_query($link,"SELECT * FROM table_products WHERE products_id='$id'");
if (mysqli_num_rows($result1) > 0)
{
$row1 = mysqli_fetch_array($result1);
do
{   
if  (strlen($row1["image"]) > 0 && file_exists("./uploads_images/".$row1["image"]))
{
$img_path = './uploads_images/'.$row1["image"];
$width = 300;
$height = 300; 
}


echo  '
<div id="block-breadcrumbs">
<p id="nav-breadcrumbs"><a href="view_cat.php?cat='.$row1["brand"].'&type='.$row1["type_tovara"].'">'.$row1["brand"].'</a> > <span>'.$row1["title"].'</span></p>
</div>

<div id="block-content-info">

<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />

<div id="block-mini-description">

<p id="content-title">'.$row1["title"].'</p>

<p id="style-price" >'.$row1["price"].' руб</p>

<a class="add-cart" id="add-cart-view" tid="'.$row1["products_id"].'" >В корзину</a>

<p id="content-text">'.$row1["description"].'</p>

</div>

</div>

';

   
}
 while ($row1 = mysqli_fetch_array($result1));


 
}
	
?>
</div>

<?php
	include("include/footer.php");
?>

</div>