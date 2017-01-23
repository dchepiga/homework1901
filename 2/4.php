<?php
/*2)Создать сайт из четырех страниц.
На четвертой странице пользователь видит список страниц, которые он посещал.*/

session_start();

echo '<pre>';
print_r($_SESSION['pages']);
echo '</pre>';

?>

Back to <a href="index.php">index.php</a>

