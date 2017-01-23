<?php
/*1)Сделайте две страницы: index.php и hello.php.
При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию.
При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".*/

session_start();

$check = (isset($_SESSION['user'])) ? "Hello, {$_SESSION['user']}!" : "Hello, unknown user!";
echo $check;
?>
<br>
<br>
Back to <a href="index.php">index.php</a>