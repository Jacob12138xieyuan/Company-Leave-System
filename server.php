<?php
session_start();

//initialising variables
$username = "";
$email = "";
$password1 = "";
$password2 = "";
$password = "";
$half_begin = 0;
$half_end = 0;

$errors = array();

//connect to db
$db = mysqli_connect('localhost', 'root', '', 'leave_system_db') or die("could not connect to db");

//print $_SESSION
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

//register users
//$_POST['username'], $_POST['email'], $_POST['username'], $_POST['username']
if (isset($_POST['register_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    //form validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password1)) {
        array_push($errors, "password is required");
    };
    if ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }

    //check if existing user
    $user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";

    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    //register if no errors
    if (count($errors) == 0) {
        $password = md5($password1); //this will encrypt the password
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        mysqli_query($db, $query);
        $_SESSION['usename'] = $username;
        $_SESSION['success'] = "You are logged in";

        header('location: index.php');
    }
}



//login user
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password';";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            $id = $user['id'];
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in successfully";
            header("location: index.php");
        } else {
            array_push($errors, "Wrong username/password");
        }
    }
}

//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    header('location: login.php');
}

//submit leave request
if (isset($_POST['apply'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $note = $_POST['note'];
    if (isset($_POST['half_begin'])) {
        $half_begin = 1;
    }
    if (isset($_POST['half_end'])) {
        $half_end = 1;
    }

    $id = $_SESSION['id'];

    if ($start_date > $end_date) {
        array_push($errors, " EndDate should be greater than StartDate ");
    }
    if (count($errors) == 0) {
        $query = "INSERT INTO leaves (id, start_date, end_date, note, half_begin, half_end) VALUES ('$id', '$start_date', '$end_date', '$note', '$half_begin', '$half_end');";
        mysqli_query($db, $query);
        echo '<script>alert("Submit successfully!")</script>';
        header('location: leave_list.php');
    }
}
