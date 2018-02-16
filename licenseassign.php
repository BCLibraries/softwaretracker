<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <?PHP require_once 'scripts/navbar.php'; 
        require_once 'scripts/optionlocations.php';?>
    </head>
    <body>
        
        <?PHP navbar(); ?>
        <div class="container">
        <h1>Assign License Key</h1>
        <form action="deployment.php?entry=<?PHP echo $_GET["software"];?>" method="POST">
            <input class="form-control" type="hidden" name="id" value="<?PHP echo $_GET["id"];?>" readonly>
            <input class="form-control" type="text" name="licensekey" value="<?PHP echo $_GET["licensekey"]; ?>" readonly>
            <input class="form-control" type="text" name="software" value="<?PHP echo $_GET["software"]; ?>" readonly>
            <select class="form-control" name='location' placeholder="Location">
                <option value="">Location</option>
                <?PHP optionLocations(); ?>
            </select>
            <select class="form-control selectusername" name='username' required>
                <option value=''>Select Username</option>
            </select>
            <input class="form-control" type='text' name='hostname' placeholder='Hostname'><br>
            <label for='datedeployed'>Date Deployed</label><br>
            <input class="form-control" type='date' name='datedeployed' placeholder='Date Deployed'><br>
            <button class="btn btn-default" name="assignlicesnse" type="submit">Assign</button>
        </form>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="js/optionusernames.js"></script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames"></script>

    </body>
</html>
