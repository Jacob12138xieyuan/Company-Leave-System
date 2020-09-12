<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Log in</h2>
        </div>
    </div>
    <form action="login.php" method="post">
        <?php include("errors.php") ?>
        <div class="input-group">
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password: </label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <button type="submit" name="login_user" class="btn"> Log in </button>
        </div>


        <p>Not yet a user?<a href="registration.php"><b>Sign up</b></a></p>

    </form>
</body>

</html>