<!---->
<!--7) Продолжение задачи 6 - дать авторизованному пользователю возможность загрузить картинку(jpg, до 3 Мб),-->
<!--на отдельной странице выводить список из всех картинок с ссылкой на скачивание, скачивание организовать-->
<!--через отдельный файл download.php, который вернет все необходимые заголовки для скачивания выбранного файла,-->
<!--а также запишет в файл со статистикой данные в сериализованном формате:-->
<!---->
<!--$stats = [-->
<!--  [-->
<!--     'filename' => 'file.jpg',-->
<!--     'downloadCount' => 1-->
<!--],-->
<!--  [-->
<!--     'filename' => 'file2.jpg',-->
<!--     'downloadCount' => 7-->
<!--],-->
<!--];-->
<!--если имя файла совпадает хоть с одним из файлов из массива со статистикой - увеличить счетчик скачиваний,-->
<!--и записать структуру снова в файл.-->


<?php

require_once('templates/header.html');
if (!isset($_COOKIE['key'])) {
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/login.php");

}

?>
<form method="post">
    <button name="sign_out" type="submit" class="btn btn-default">Sign out</button>
</form>
<hr>
<form enctype="multipart/form-data" action="<?= dirname($_SERVER['PHP_SELF']) . '/links.php'; ?>" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
    <div class="form-group">
        <label for="inputFile">File input</label>
        <input type="file" id="inputFile" name="userfile">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
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


