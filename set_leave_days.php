<!-- admin add/delete holidays of the company -->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mangage leave days</title>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            width: 100%;
            margin: 0px auto;
            border: 1px solid #b0c4de;
            background: white;
            border-radius: 10px;
        }

        .menu {
            width: 25%;
            float: left;
            padding-left: 120px;
        }

        .main {
            width: 75%;
            float: left;
            padding: 10px 40px 0px 40px;
        }

        table,
        th,
        tr,
        td {
            margin: auto;
            padding: 10px;
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
            font-size: 20px;
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
        <h2>Manage Leave Days</h2>
    </div>

    <div style="margin: 40px;">
        <div class="menu">
            <br>
            <h2>Add/Edit Leave Days</h2>
            <br>
            <!-- add leave days for specific year -->
            <form action="" method="post">
                <?php include("errors.php") ?>
                <div class="input-group">
                    <label for="year">For year: </label>
                    <input type="text" placeholder="e.g.2020" name="year" required>
                </div>
                <div class="input-group">
                    <label for="annual_leave">Annual leave: </label>
                    <input type="text" placeholder="e.g.15" name="annual_leave" required>
                </div>
                <div class="input-group">
                    <label for="medical_leave">Medical leave: </label>
                    <input type="text" placeholder="e.g.18" name="medical_leave" required>
                </div>

                <div class="input-group">
                    <button type="submit" name="add_leave_year" class="btn"> Add/Edit Leave Days </button>
                </div>

            </form>
        </div>

        <div class="main">
            <table style="margin-top: 25px;">
                <tr>
                    <th>Year</th>
                    <th>Annual Leave</th>
                    <th>Medical Leave</th>
                    <th>Delete</th>
                </tr>

                <?php
                $query = "SELECT * FROM leave_year ORDER BY year;";
                $results = mysqli_query($db, $query);
                echo "<table>"; // start a table tag in the HTML

                while ($row = mysqli_fetch_array($results)) {   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['year'] . "</td><td>" . $row['annual_leave'] . "</td><td>" . $row['medical_leave'] . "</td><td><a onclick=\"return confirm('Are you sure to delete leave year?')\" href='server.php?delete_leave_year={$row['year']}' class='btn' style='background-color: red; text-decoration: none;'><i class='fa fa-trash'></i> Delete</a></td></tr>";  //delete botton    
                }

                echo "</table>"; //Close the table in HTML
                ?>
            </table>
        </div>
    </div>
    <br>
    <br>



</body>

</html>