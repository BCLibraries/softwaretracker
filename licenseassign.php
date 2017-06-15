<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Assign License</title>
        <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
        <?PHP require_once 'scripts/navbar.php'; 
        require_once '/apps/softwaretracker/scripts/optionlocations.php';?>
    </head>
    <body>
        
        <?PHP navbar(); ?>
        <h1>Assign License Key</h1>
        <form action="deployment.php?entry=<?PHP echo $_GET["software"];?>" method="POST">
            <input type="hidden" name="src" value="assignlicense">
            <input type="hidden" name="id" value="<?PHP echo $_GET["id"];?>" readonly>
            <input type="text" name="licensekey" value="<?PHP echo $_GET["licensekey"]; ?>" readonly>
            <input type="text" name="software" value="<?PHP echo $_GET["software"]; ?>" readonly>
            <select name='location' placeholder="Location">
                <option value="">Location</option>
                <?PHP optionLocations(); ?>
            </select>
            <select class="selectusername" name='username' required>
                <option value=''>Select Username</option>
            </select>
            <input type='text' name='hostname' placeholder='Hostname'><br>
            <label for='datedeployed'>Date Deployed</label><br>
            <input type='date' name='datedeployed' placeholder='Date Deployed'><br>
            <input type="submit" placeholder="Assign">
        </form>
    </body>
    <script src="js/optionusernames.js">
    </script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames">
    </script>
</html>
