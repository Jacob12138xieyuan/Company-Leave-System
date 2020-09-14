<!-- admin add/delete holidays of the company -->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mangage holidays</title>
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
        <h2>Manage Holidays</h2>
    </div>

    <h3 style="text-align: center; margin-top: 30px">Today is: <?php echo $today_date = date('Y-m-d', time()); ?></h3>


    <div style="margin: 40px;">
        <div class="menu">
            <br>
            <h2>Add New Holiday</h2>
            <br>
            <!-- add new holiday -->
            <form action="" method="post">
                <?php include("errors.php") ?>
                <div class="input-group">
                    <label for="holiday_name">Holiday name: </label>
                    <input type="text" name="holiday_name">
                </div>
                <div class="input-group">
                    <label for="holiday_date">Holiday date: </label>
                    <input type="date" name="holiday_date">
                </div>

                <div class="input-group">
                    <button type="submit" name="add_holiday" class="btn"> Add holiday </button>
                </div>

            </form>
        </div>

        <div class="main">
            <table style="margin-top: 25px;">
                <tr>
                    <th>Holiday Name</th>
                    <th>Holiday Date</th>
                    <th>Day</th>
                    <th>Delete Holiday</th>
                </tr>

                <?php
                $query = "SELECT * FROM holidays ORDER BY holiday_date;";
                $results = mysqli_query($db, $query);
                echo "<table>"; // start a table tag in the HTML

                while ($row = mysqli_fetch_array($results)) {   //Creates a loop to loop through results
                    echo "<tr><td>" . $row['holiday_name'] . "</td><td>" . $row['holiday_date'] . "</td><td>" . $row['day'] . "</td><td><a onclick=\"return confirm('Are you sure to delete holiday?')\" href='server.php?delete_holiday={$row['holiday_id']}' class='btn' style='background-color: red; text-decoration: none;'><i class='fa fa-trash'></i> Delete</a></td></tr>";  //delete botton    
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