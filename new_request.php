<form method="post" action="index.php">
    <h2>Create New Leave Request</h2>
    <?php include("errors.php") ?>
    <div class="input-group">
        <?php include('calendar.php') ?>
        <label for="start_date">Start date: </label>
        <input type="text" placeholder="MM/DD/YYYY" id="start_date" name="start_date" required>
    </div>
    <div class="input-group">
        <?php include('calendar.php') ?>
        <label for="end_date">End date: </label>
        <input type="text" placeholder="MM/DD/YYYY" id="end_date" name="end_date" required>
    </div>
    <div class="input-group">
        <label for="note">Note: </label>
        <input type="text" name="note">
    </div>
    <div>
        <br>
        Half day on beginning day: <input type="checkbox" name="half_begin">
    </div>

    <div>
        <br>
        Half day on end day: <input type="checkbox" name="half_end">
    </div>


    <br>
    <button onclick="return confirm('Are you sure to submit?')" type="submit" id="apply" name="apply" class="btn" style='font-size: 20px'> Submit request </button>
</form>