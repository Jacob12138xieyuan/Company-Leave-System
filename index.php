<?php
include('server.php');
// session_start();

if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first to view this paage";
    header("location: login.php");
}

// if (isset($_GET['logout'])) {
//     session_destroy();
//     unset($_SESSION['username']);
//     header("location: login.php");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h1>Home page</h1>
    </div>

    <?php if (isset($_SESSION['success'])) : ?>

        <div>
            <h3>
                <?php

                echo $_SESSION['success'];
                unset($_SESSION['success']);

                ?>
            </h3>
        </div>

    <?php endif ?>

    <?php if (isset($_SESSION['username'])) : ?>

        <h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
        <button><a href="index.php?logout='1'">Log out</a></button>

    <?php endif ?>
</body>

</html>