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
</head>

<body>
    <div class="header">
        <h1>Employer Leave System</h1>
    </div>

    <div class="content" style="border-radius: 0px 0px 10px 10px;">
        <?php if (isset($_SESSION['success'])) : ?>

            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    //unset($_SESSION['success']);
                    ?>
                </h3>
            </div>

        <?php endif ?>

        <?php if (isset($_SESSION['username'])) : ?>
            <div>
                <p style="float:left">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p style="float:right"><a href="index.php?logout='1'" style="color: red;">Log out</a></p>
            </div>
            <br>
            <br>
            <?php
            $type = $_SESSION['user_type'];
            if ($type == 'admin') {
                include('admin_home.php');
            } else {
                $query = "SELECT * FROM users WHERE username='{$_SESSION['username']}';";
                $user = mysqli_query($db, $query);
                $user = mysqli_fetch_assoc($user);
                $left_days = $user['left_days'];
                $taken_days = 15 - $left_days;
                $_SESSION['left_days'] = $left_days;
                echo "<p>You have taken <strong>" . $taken_days . " days</strong> of annual leave! </p>";
                echo "<br>";
                echo "<p>You have <strong>" . $left_days . " days</strong> of annual leave <strong>left</strong>! </p>";
                echo "<br>";
                echo "<a href='leave_list.php'><button class='btn' style='font-size: 20px'><i class='fa fa-bars'></i> View my leave request </button></a>";
            }
            ?>
        <?php endif ?>
    </div>

    <?php
    $type = $_SESSION['user_type'];
    if ($type == 'normal') {
        include('new_request.php');
    }
    ?>

    <br>
    <br>
</body>

</html>