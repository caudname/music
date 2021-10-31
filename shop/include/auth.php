<?php
    
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    include('db_connect.php');
    
    $login = htmlspecialchars($_POST["login"]);    
    $pass  = htmlspecialchars($_POST["pass"]);
    $query = "SELECT * FROM reg_user WHERE login='$login' AND pass='$pass'";
$result = mysqli_query($link,$query);

if (mysqli_num_rows($result) != 0)
{
    $row = mysqli_fetch_array($result);
    session_start(); 
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_pass'] = $row["pass"];
    $_SESSION['auth_login'] = $row["login"];
    $_SESSION['auth_surname'] = $row["surname"];
    $_SESSION['auth_name'] = $row["name"];
    $_SESSION['auth_patronymic'] = $row["patronymic"];
    $_SESSION['auth_address'] = $row["address"];
    $_SESSION['auth_phone'] = $row["phone"];
    $_SESSION['auth_email'] = $row["email"];
echo 'Добро пожаловать';
}else
{  
    echo 'Неверный логин или пароль';

}  
}
?>

