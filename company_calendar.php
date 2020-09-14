<?php include('server.php');
$leave_date = date('Y-m-d', time()); //default today
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Company Calendar</title>
    <style>
        table,
        th,
        tr,
        td {
            margin: auto;
            padding: 10px;
            border-collapse: collapse;
            border: 1px solid black;
            width: 80%;
            font-size: 23px;
            text-align: center;
        }

        th {
            width: 20%;
            background-color: #5f9ea0;
            color: white;
        }

        td {
            width: 20%;
        }

        tr {
            height: 20px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>


    <a href="index.php"><button name="back" class="btn" style="margin-top: 20px; margin-left: 50px"><i class="fa fa-angle-left"></i> Back </button></a>
    <div class="header">
        <h2>Company Calendar</h2>
    </div>
    <form action="company_calendar.php" method="POST">
        <h2>View Employees on Leave Today </h2>
        <br>
        <?php

        if (isset($_POST['calendar'])) {
            $leave_date = $_POST['leave_date']; //'09/14/2020'
            $leave_date_array = explode("/", $leave_date);
            $leave_date = $leave_date_array[2] . "-" . $leave_date_array[0] . "-" . $leave_date_array[1];
        }
        echo "<strong>" . $leave_date . "</strong>";
        ?>

        <br>

        <div class="input-group">
            <?php include('calendar.php') ?>
            <label for="leave_date">Select date: </label>
            <input type="text" placeholder="MM/DD/YYYY" id="leave_date" name="leave_date" required>
            <br>
            <br>
            <button type="submit" id="calendar" name="calendar" class="btn" style='font-size: 15px; float:right'> Submit date </button>
        </div>


        <br>
    </form>
    <br>
    <br>
    <h2 style="text-align: center;">Employees leave on date<?php echo "<strong>" . $leave_date . "</strong>"; ?></h2>
    <table style="margin-top: 25px;">
        <tr>
            <th>Employee Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Left Annual Leave</th>
        </tr>

        <?php

        if (isset($leave_date)) {
            $query = "SELECT username FROM leaves WHERE '$leave_date' BETWEEN start_date and end_date;";
            $results = mysqli_query($db, $query);
            $usernames = mysqli_fetch_assoc($results);


            if (isset($usernames)) {
                $usernames_ = array();
                foreach ($usernames as $username) {
                    $usernames_[] = $username;
                }
                $query = "SELECT * FROM users WHERE username IN ('" . implode(',', $usernames_) . "')";
                $results = mysqli_query($db, $query);

                echo "<table>"; // start a table tag in the HTML

                while ($row = mysqli_fetch_array($results)) {   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['left_days'] . "</td></tr>";  //approve and reject botton
                }

                echo "</table>"; //Close the table in HTML
            }
        }
        ?>
    </table>


    <br>
    <br>

</body>

</html>