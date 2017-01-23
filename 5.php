<?php
/*5) Запишите в сессию время захода пользователя на сайт.
При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.*/

session_start();

if (array_key_exists('last_visited', $_SESSION)) {
    $lastTime = $_SESSION['last_visited'];
    $currentTime = time() - $lastTime;
    echo "{$currentTime} seconds since last visit";


}
$_SESSION['last_visited'] = time();
