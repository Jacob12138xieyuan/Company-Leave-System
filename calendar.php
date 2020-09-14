<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>


<script type="text/javascript">
    <?php
    //get holidays from database, convert to js array
    $db = mysqli_connect('localhost', 'root', '', 'leave_system_db') or die("could not connect to db");
    $query = "SELECT * FROM holidays ORDER BY holiday_date;";
    $results = mysqli_query($db, $query);
    $holidays = array();
    while ($row = mysqli_fetch_array($results)) {   //Creates a loop to loop through results
        $date_explode = explode("-", $row['holiday_date']);
        $holidays[] = [$date_explode[0], $date_explode[1], $date_explode[2], $row['holiday_name']];
    }
    $holiDays = json_encode($holidays);
    echo "var holiDays = " . $holiDays . ";\n";
    ?>

    // var holiDays = [
    //     ["2020", "01", "01", "New Year's Day"],
    //     ["2020", "04", "10", "Good Friday"],
    //     ["2020", "05", "01", "Labour Day"],
    //     ["2020", "05", "07", "Vesak Day"],
    //     ["2020", "05", "24", "Hari Raya Puasa"]
    // ];

    $(function() {
        $("#start_date").datepicker({
            beforeShowDay: setHoliDays
        });
        $("#end_date").datepicker({
            beforeShowDay: setHoliDays
        });

        // set holidays function which is configured in beforeShowDay
        function setHoliDays(date) {
            for (i = 0; i < holiDays.length; i++) {

                if (date.getFullYear() == holiDays[i][0]

                    &&
                    date.getMonth() == holiDays[i][1] - 1

                    &&
                    date.getDate() == holiDays[i][2]) {

                    return [true, 'holiday', holiDays[i][3]];

                }

            }

            return [true, ''];

        }

    });
</script>
<style type="text/css">
    .ui-datepicker td.holiday a,
    .ui-datepicker td.holiday a:hover {
        background: #FFEBAF;
        border: 1px solid #BF5A0C;
    }
</style>