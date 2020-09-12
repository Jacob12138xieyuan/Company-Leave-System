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
            font-size: 25px;
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
    <a href="index.php"><button name="back" class="btn" style="margin-top: 20px; margin-left: 50px"> Back </button></a>
    <div class="header" style="border-radius: 10px;">
        <h2>Leave History</h2>
    </div>

    <table style="margin-top: 25px;">
        <tr>
            <th>Name</th>
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
        $query = "SELECT * FROM leaves;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['username'] . "</td><td>" . $row['start_date'] . "</td><td>" . $row['end_date'] . "</td><td>" . $row['note'] . "</td><td>", ($row['half_begin']) ? 'Yes' : 'No', "</td><td>", ($row['half_end']) ? 'Yes' : 'No', "</td><td>" . $row['days'] . "</td><td>" . $row['status']
                . "</td><td style='width: 15%'><a onclick=\"return confirm('Are you sure to approve?')\" href='server.php?approve={$row['leave_id']}' class='btn' style='background-color: blue; text-decoration: none;'>Approve</a> 
                <a onclick=\"return confirm('Are you sure to reject?')\" href='server.php?reject={$row['leave_id']}' class='btn' style='background-color: red; text-decoration: none;'>Reject</a></td></tr>";  //approve and reject botton
        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>

</body>

</html>