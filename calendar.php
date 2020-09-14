<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

<script type="text/javascript">
    var holiDays = [
        [2020, 05, 01, 'Maharashtra Day'],
        [2020, 08, 15, 'Independence Day'],
        [2020, 08, 28, 'JANMASHTAMI'],
        [2020, 09, 09, 'GANESH CHATURTHI'],
        [2020, 10, 02, 'GANDHI JAYNTI']
    ];
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