<!--4) Спросите у пользователя телефон с помощью формы.-->
<!--Затем сделайте так, чтобы при повторном открытии страницы, в форме-->
<!--(поля: имя, фамилия, телефон) поле телефон, телефон были автоматически заполнены.-->


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
                    <label for="inputPhone">Phone</label>

                    <div>
                        <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="Phone"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <button name="send_tel" type="submit" class="btn btn-default">Send</button>
                    </div>
                </div>
            </form>
            <?php

            $phone = ob_get_contents();
            ob_end_clean();

            ob_start();

            ?>
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputPhone">Phone</label>

                    <div>
                        <input type="tel" class="form-control" id="inputPhone" placeholder="Phone"
                               value="<?= $_COOKIE['phone']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputName">Name</label>

                    <div>
                        <input type="text" class="form-control" id="inputName" placeholder="Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSurname">Surname</label>

                    <div>
                        <input type="text" class="form-control" id="inputSurname" placeholder="Surname" required>
                    </div>
                </div>

            </form>
            <?php

            $form = ob_get_contents();
            ob_end_clean();

            echo (!isset($_COOKIE['phone'])) ? $phone : $form;


            if (isset($_POST['send_tel'])) {
                setcookie("phone", $_POST['phone'], null, "/");
                header("Location: " . dirname($_SERVER['PHP_SELF']) . "/");
            }

            ?>
        </div>
    </div>
</div>
</body>
</html>

