<!-- show all leave requests history of normal user -->


<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leave history</title>
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
    <div class="header">
        <h2>My Leave History</h2>
    </div>
    <div class="content" style="border-radius: 0px 0px 10px 10px ;">

        <?php if (isset($_SESSION['username'])) : ?>
            <div>
                <p style="float:left">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p style="float:right"><a href="index.php?logout='1'" style="color: red;">Log out</a></p>
            </div>
            <br>
            <br>
            <?php
            echo "<p>You have taken <strong>" . (15 - $_SESSION['left_days']) . " days</strong> of annual leave! </p>";
            echo "<br>";
            echo "<p>You have <strong>" . $_SESSION['left_days'] . " days</strong> of annual leave <strong>left</strong>! </p>"
            ?>

        <?php endif ?>
    </div>

    <h3 style="text-align: center;margin-top: 40px;margin-bottom:30px">Pending Request</h3>
    <table style="margin-top: 25px;">
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Note</th>
            <th>Take Half Start Date</th>
            <th>Take Half End Date</th>
            <th>Taken Days</th>
            <th>Status</th>
            <th>Cancel Request</th>
        </tr>

        <?php
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];

        $query = "SELECT * FROM leaves WHERE id='$id' AND admin_active=1 ORDER BY leave_id DESC;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status']
                . "</td><td><a onclick=\"return confirm('Are you sure to cancel?')\" href='server.php?cancel={$row['leave_id']}' class='btn' style='background-color: red; text-decoration: none;'><i class='fa fa-close'></i> Cancel</a></td></tr>";  //$row['index'] the index here is a field name
        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>

    <h3 style="text-align: center; margin-top: 30px; margin-bottom:30px">Responsed Request</h3>
    <table style="margin-top: 25px;">
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Note</th>
            <th>Take Half Start Date</th>
            <th>Take Half End Date</th>
            <th>Taken Days</th>
            <th>Status</th>
            <th>Cancel Request</th>
        </tr>

        <?php
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        $query = "SELECT * FROM leaves WHERE id='$id' AND admin_active=0 ORDER BY leave_id DESC;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status']
                . "</td><td><a onclick=\"return confirm('Are you sure to cancel?')\" href='server.php?cancel={$row['leave_id']}' class='btn' style='background-color: red; text-decoration: none;'><i class='fa fa-close'></i> Cancel</a></td></tr>";  //$row['index'] the index here is a field name
        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>

</body>

</html>