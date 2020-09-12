<form method="post" action="index.php">
    <h2>Create New Leave Request</h2>
    <?php include("errors.php") ?>
    <div class="input-group">
        <label for="start_date">Start date: </label>
        <input type="date" name="start_date" required>
    </div>
    <div class="input-group">
        <label for="end_date">End date: </label>
        <input type="date" name="end_date" required>
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
    <button type="submit" id="apply" name="apply" class="btn"> Submit request </button>
</form>