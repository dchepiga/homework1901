<?php
/*1)Сделайте две страницы: index.php и hello.php.
При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию.
При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".*/

session_start();
if (!empty($_POST)) {
    $_SESSION['user'] = $_POST['user'];
}
?>

<form action="<?= dirname($_SERVER['PHP_SELF']); ?>/" method="post">
    Set name: <input name="user" type="text">
    <input type="submit" value="Submit">
</form>

Visit <a href="hello.php">hello.php</a>