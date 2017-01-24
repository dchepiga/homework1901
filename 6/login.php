<?php
require_once('templates/header.html');

if (isset($_POST['sign_in'])) {

    setcookie("key", uniqid(), null, '/');
    header("Location: " . dirname($_SERVER['PHP_SELF']) . "/");
}

?>
<form action="<?= $_SERVER['PHP_SELF']; ?>/" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="inputLogin" class="control-label">Login</label>

        <div>
            <input type="text" class="form-control" id="inputLogin" placeholder="Login" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="control-label">Email</label>

        <div>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="control-label">Password</label>

        <div>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
        </div>
    </div>
    <div class="form-group">
        <div>
            <button name="sign_in" type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>
<?php
require_once('templates/footer.html');
?>

