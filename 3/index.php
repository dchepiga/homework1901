<!--3) Создать форму авторизации на сайте с тремя обязательных полями:-->
<!--login, password и email. Если данные введены верно, то записать в-->
<!--cookies специальный ключ, при наличии которого пользователю доступна кнопка  "Выход".-->
<!--В момент выхода происходит удаление созданной ранее cookies.-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class="container ">
    <div class="row">
        <div class="col-md-6 col-md-offset-2 ">
            <hr>

            <?php ob_start(); ?>

            <form action="<?= dirname($_SERVER['PHP_SELF']); ?>/" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputLogin" class="col-sm-2 control-label">Login</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputLogin" placeholder="Login" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button name="sign_in" type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
            <?php

            $form = ob_get_contents();
            ob_end_clean();

            ob_start();

            ?>
            <form method="post">
                <button name="sign_out" type="submit" class="btn btn-default">Sign out</button>
            </form>
            <?php

            $signOut = ob_get_contents();
            ob_end_clean();

            echo (isset($_COOKIE['key'])) ? $signOut : $form;


            if (isset($_POST['sign_in'])) {
                setcookie("key", uniqid(), null, "/");
                header("Location: " . dirname($_SERVER['PHP_SELF']) . "/");
            }
            if (isset($_POST['sign_out'])) {
                if (isset($_COOKIE['key'])) {
                    setcookie('key', "", time() - 3600, "/");
                }
                header("Location: " . dirname($_SERVER['PHP_SELF']) . "/");
            }

            ?>
        </div>
    </div>
</div>
</body>
</html>

