<?php
/*2)Создать сайт из четырех страниц.
На четвертой странице пользователь видит список страниц, которые он посещал.*/

session_start();
$_SESSION['pages'][] = '2.php';

?>

Visit <a href="index.php">index.php</a><br>
Visit <a href="3.php">3.php</a><br>
Visit <a href="4.php">4.php</a>
