<!--6) Доработать 3-задачу таким образом, чтобы при отсутствии авторизационной куки,-->
<!--пользователя редиректило на файл login.php, который рендерит форму и пытается авторизовать-->
<!--пользователя(функционал по авторизации также перенести в этот файл)-->


<?php

require_once('templates/header.html');
if (!isset($_COOKIE['key'])) {
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/login.php");

}

?>

<form method="post">
    <button name="sign_out" type="submit" class="btn btn-default">Sign out</button>
</form>

<?php

if (isset($_POST['sign_out'])) {
    if (isset($_COOKIE['key'])) {
        setcookie('key', "", time() - 3600, '/');
    }
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/login.php");
}
require_once('templates/footer.html');
?>


