<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("db_connect.php");

$result = mysqli_query($link,"SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products");
if (mysqli_num_rows($result) > 0)
{
$row = mysqli_fetch_array($result);

do
{
$count = $count + $row["cart_count"];    
$int = $int + ($row["price"] * $row["cart_count"]); 
}
 while ($row = mysqli_fetch_array($result));

    $str=" тов.";

     echo '<span>'.$count.$str.'</span> на сумму <span>'.$int.'</span> руб';
}
else
{

     echo '0';

}
}
?>