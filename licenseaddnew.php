<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Licenses to Software</title>
        <link rel='stylesheet' type='text/css' href='css/mainstyle.css'>
        <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';?>
        <script src='js/morelicenses.js'></script>
    </head>
    <body>
        <?PHP navbar();
        require_once '/apps/softwaretracker/scripts/softwarebar.php';?>
        <h1>Add Licenses to <?PHP echo FILTER_INPUT(INPUT_GET, "entry", FILTER_SANITIZE_STRING);?></h1>
        <form id='addlicenses' action='confirm.php' method="POST">
            <input type='hidden' name='src' value='addlicense'>
            <input type='hidden' name='software' value='<?PHP echo FILTER_INPUT(INPUT_GET, "entry", FILTER_SANITIZE_STRING);?>'>
            <input type='text' name='licensekey[]' placeholder="License Key"><br>
            <select name='platform[]'>
                <option>Select Platform</option>
                <option value='PC'>PC</option>
                <option value='Mac'>Mac</option>
                <option value='Both'>Both</option>
            </select><br>
        </form>
        <button onclick='moreLicenses()'>Add More Licenses</button>
        <input form='addlicenses' type='submit'>
    </body>
</html>
