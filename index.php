<?php
include('server.php');

if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first to view this paage";
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employer Leave System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h1>Employer Leave System</h1>
    </div>

    <div class="content">
        <?php if (isset($_SESSION['success'])) : ?>

            <div class="error success">
                <h3>
                    <?php

                    echo $_SESSION['success'];
                    unset($_SESSION['success']);

                    ?>
                </h3>
            </div>

        <?php endif ?>

        <?php if (isset($_SESSION['username'])) : ?>

            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <a href="leave_list.php"><button class="btn" style="float:right;"> View leave history </button></a>
            <p><a href="index.php?logout='1'" style="color: red;">Log out</a></p>

        <?php endif ?>
    </div>
    <form method="post" action="index.php">
        <?php include("errors.php") ?>
        <div class="input-group">
            <label for="start_date">Start date: </label>
            <input type="date" name="start_date" required>
        </div>
        <div class="input-group">
            <label for="end_date">End date: </label>
            <input type="date" name="end_date" required>
        </div>
        <div class="input-group">
            <label for="note">Note: </label>
            <input type="text" name="note">
        </div>
        <div>
            <br>
            Half day on beginning day: <input type="checkbox" name="half_begin">
        </div>

        <div>
            <br>
            Half day on end day: <input type="checkbox" name="half_end">
        </div>


        <br>
        <button type="submit" id="apply" name="apply" class="btn"> Submit new request </button>

    </form>


</body>

</html>