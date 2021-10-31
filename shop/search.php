<?php
  include("include/db_connect.php");
  session_start();
   
$search = htmlspecialchars($_GET["q"]);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Поиск <?php echo $search; ?></title>
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
  <ul id="block-tovar-grid">
  <?php
    $result = mysqli_query($link,"SELECT * FROM table_products WHERE title LIKE '%$search%'");

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
        
      
    } else {
      echo "<h1 id='noresult'>По запросу '".$search."' результатов нет</h1>";
    }
  ?>
  </ul>
</div>

<?php
  include("include/footer.php");
?>

</div>