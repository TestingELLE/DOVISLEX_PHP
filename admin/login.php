<?php 
session_start();

if (isset($_POST["submit"])) {
    $_SESSION['uname'] = $_POST["username"];
    $_SESSION['uname_long'] = "z1bb6fc8_" . $_SESSION['uname'];
    $_SESSION['psw'] = $_POST["password"];

    include_once("connection.php");

    if(isset($connection)){
        $result = $connection->query("SELECT * FROM accounts WHERE username='".$_SESSION['uname']."' limit 1");

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['type'] = $row['type'];

            if(in_array($row['type'], ["Admin", "Maintainer", "Programmer"])) {
                header("location: posts.php");
                exit();
            } else {
//                $_SESSION['login_error'] = 'Invalid user type.';
                header("location: ../it/index.php");
            }
        } else {
            $_SESSION['login_error'] = 'Invalid username or password.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2 class="text-center">Dovislex</h2>
                <h4 class="text-center">Manage Posts</h4>
                <?php if(isset($_SESSION['login_error'])): ?>
                    <p class="alert alert-danger"><?= $_SESSION['login_error']; ?></p>
                    <?php unset($_SESSION['login_error']); ?>
                <?php endif; ?>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">User</label>
                        <input type="text" class="form-control" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </form>
                <p class="mt-3">This page is for internal use or authorized clients only.</p>
            </div>
        </div>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
