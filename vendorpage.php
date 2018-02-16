<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Vendor Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">  
        <?PHP 
         require_once 'scripts/navbar.php';
         require_once 'scripts/loadvendor.php';
         require_once 'scripts/listsoftwarebyvendor.php';
         if ($_SESSION["role"] === 'admin'): ?>
             <script src='js/deletevendor.js' type='text/javascript'></script>
         <?PHP endif; ?>
    </head>
    
    <body>
        <?PHP navbar(); ?>
        <div class="container">
            <h1>Entry Details</h1>
            <table class="table table-hover">
                <?PHP $entry = loadVendor($_GET["vendor"]) ?>
                <tr><td>Vendor:</td><td><?PHP echo $entry["vendor_name"] ?></td></tr>
                <tr><td>Contact First Name:</td><td><?PHP echo $entry["contact_first"] ?></td></tr>
                <tr><td>Contact Last Name:</td><td><?PHP echo $entry["contact_last"] ?></td></tr>
                <tr><td>Contact Phone:</td><td><?PHP echo $entry["contact_phone"] ?></td></tr>
                <tr><td>Contact Email:</td><td><?PHP echo "<a href='mailto:$entry[email]'>$entry[email]</a>"; ?></td></tr>
                <tr><td>General Phone:</td><td><?PHP echo $entry["general_phone"] ?></td></tr>
                <tr><td>Notes:</td><td><?PHP echo $entry["notes"] ?></td></tr>
            </table>

        <h1>Software from this Vendor</h1>
                <?php listSoftwareByVendor($_GET["vendor"]);?>
            <br>

        <h1>Modify Vendor</h1>
            <div id="modify-vendor">               
            <form action="/softwaretracker/confirm.php" method='POST'>
                    <legend>Please enter your data</legend>
                    <input class="form-control" type="text" name="vendor_name" value="<?PHP echo $entry["vendor_name"]; ?>" readonly>
                    <input class="form-control" type="text" name="contact_first" placeholder="Contact First Name">
                    <input class="form-control" type="text" name="contact_last" placeholder="Contact Last Name">
                    <input class="form-control" type="tel" name="contact_phone" placeholder="Contact Phone">
                    <input class="form-control" type="text" name="email" placeholder="Contact Email">
                    <input class="form-control" type="tel" name="general_phone" placeholder="General Phone">
                 <legend>Additional Notes</legend>
                    <textarea class="form-control" name="notes" placeholder="Enter comments"></textarea>
                <br>
                <button class="btn btn-default" type="submit" name="updatevendor">Update</button
            </form>
            </div>
         <?PHP if ($_SESSION["role"] === 'Admin'){
        echo "<h1>Delete Vendor</h1>";
        echo "<button class='btn btn-default' onclick='deleteVendor(\"$entry[vendor_name]\")' type='button'>Delete</button>";}?> 
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        </body>
</html>