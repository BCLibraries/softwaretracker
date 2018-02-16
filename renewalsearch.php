<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <?PHP require_once 'scripts/navbar.php';?>
    <title>Search Renewals</title>
</head>
<body>
<?PHP navbar(); ?>
    <div class="container">
<?PHP require_once 'scripts/reportbar.php';?>
<h1>Search for Upcoming Renewals</h1>
    <form action='searchresults.php' method="POST">
        Show software with renewals in the next<input type='number' name="days">day(s).
        <button class="btn btn-default" name="upcomingrenewals"type='submit'>Search</button>
    </form>
<h1>Check a Range of Dates for Renewal</h1>
    <form class="form-inline" action='searchresults.php' method="POST">
        Show software with renewals between <input class="form-control" type="date" name="date1" placeholder="year-month-day"> and <input class="form-control" type="date" name="date2" placeholder="year-month-day">
        <button class="btn btn-default" name="rangerenewals"type='submit'>Search</button>
    </form>
    </div>
</body>
</html>
