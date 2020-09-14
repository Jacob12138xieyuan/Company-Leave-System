<!-- registration page -->

<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>
    </div>
    <form action="registration.php" method="post">
        <?php include("errors.php"); ?>
        <div class="input-group">
            <label for="username">Username: </label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label for="email">Email: </label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label for="password">Password: </label>
            <input type="password" name="password1">
        </div>
        <div class="input-group">
            <label for="username">Confirm password: </label>
            <input type="password" name="password2">
        </div>

        <div class="input-group">
            <button type="submit" name="register_user" class="btn"> Register </button>
        </div>


        <p>Already a user?<a href="login.php"><b>Log in</b></a></p>

    </form>
</body>

</html>