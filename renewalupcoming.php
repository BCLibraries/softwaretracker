<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Upcoming Renewals</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src='js/downloadreport.js' type='text/javascript'></script>
        <?PHP require_once 'scripts/navbar.php';
        require_once 'scripts/tableupcomingrenewals.php';?>
    </head>
    <body>
        <?PHP navbar();?>
        <div class="container">
        <?php require_once 'scripts/reportbar.php';?>
        <h1>Upcoming Renewals</h1>
        <p>The following software is up for renewal in the next 60 days.</p>
        <?PHP tableUpcomingRenewals("60");?>
        <button class="btn btn-default" onclick="downloadUpcomingReport('60')">Download</button>
        <button class="btn btn-default" onclick='location.href="printerfriendly.php?report=upcoming&days=60"'>Print</button>
        
        <h1>Near Future Renewals</h1>
        <p>The following software is up for renewal in the next 90 days.</p>
        <?PHP tableUpcomingRenewals("90");?>
        <button class="btn btn-default" onclick="downloadUpcomingReport('90')">Download</button>
        <button class="btn btn-default" onclick='location.href="printerfriendly.php?report=upcoming&days=90"'>Print</button>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
