<!-- admin view all employee information -->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Employees</title>
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
    <div class="header" style="border-radius: 10px;">
        <h2>Emplyees Information</h2>
    </div>

    <table style="margin-top: 25px;">
        <tr>
            <th>Employee Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Left Annual Leave</th>
        </tr>

        <?php
        $query = "SELECT * FROM users ORDER BY id;";
        $result = mysqli_query($db, $query);
        echo "<table>"; // start a table tag in the HTML

        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['annual_leave'] . "</td></tr>";  //approve and reject botton
        }

        echo "</table>"; //Close the table in HTML
        ?>
    </table>


    <br>
    <br>

</body>

</html>