<!-- admin view all leave request history of all users -->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All pending Leave request</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            width: 10%;
            background-color: #5f9ea0;
            color: white;
        }

        td {
            width: 10%;
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
    <div class="header" style="border-radius: 10px;">
        <h2>Manage Leave Requests</h2>
    </div>

    <h3 style="text-align: center;margin-top: 40px;margin-bottom:30px">Pending Request</h3>
    <table style="margin-top: 25px;">
        <tr>
            <th>Name</th>
            <th style="width: 5%;">Left days</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Note</th>
            <th>Half Start Day</th>
            <th>Half End Day</th>
            <th>Total Days</th>
            <th>Status</th>
            <th style="width: 15%;">Response Request</th>
        </tr>

        <?php
        $query = "SELECT * FROM leaves WHERE admin_active=1 ORDER BY leave_id DESC;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            $query = "SELECT * FROM users WHERE username='{$row['username']}';";
            $user = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($user);
            if ($row['status'] == 'cancelling') { // approve cancelling after start day
                echo "<tr><td>" . $row['username'] . "</td><td style='width: 5%;'>" . $user['left_days'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status']
                    . "</td><td style='width: 15%'><a onclick=\"return confirm('Are you sure to approve cancelling?')\" href='server.php?approve_cancel={$row['leave_id']}' class='btn' style='background-color: blue; text-decoration: none;'><i class='fa fa-check'></i> Approve cancel request</a> </td></tr>";  //approve and reject botton
            } else {
                echo "<tr><td>" . $row['username'] . "</td><td style='width: 5%;'>" . $user['left_days'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status']
                    . "</td><td style='width: 15%'><a onclick=\"return confirm('Are you sure to approve?')\" href='server.php?approve={$row['leave_id']}' class='btn' style='background-color: blue; text-decoration: none;'><i class='fa fa-check'></i> Approve</a> 
                <a onclick=\"return confirm('Are you sure to reject?')\" href='server.php?reject={$row['leave_id']}' class='btn' style='background-color: red; text-decoration: none;'><i class='fa fa-close'></i> Reject</a></td></tr>";  //approve and reject botton
            }
        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>

    <h3 style="text-align: center; margin-top: 30px; margin-bottom:30px">Responsed Request</h3>
    <table style="margin-top: 25px;">
        <tr>
            <th>Name</th>
            <th style="width: 5%;">Left days</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Note</th>
            <th>Half Start Day</th>
            <th>Half End Day</th>
            <th>Total Days</th>
            <th>Status</th>

        </tr>

        <?php
        $query = "SELECT * FROM leaves WHERE admin_active=0 ORDER BY leave_id DESC;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            $query = "SELECT * FROM users WHERE username='{$row['username']}';";
            $user = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($user);

            echo "<tr><td>" . $row['username'] . "</td><td style='width: 5%;'>" . $user['left_days'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status'] . "</td></tr>";  //approve and reject botton

        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>
    <br>
    <br>

</body>

</html>