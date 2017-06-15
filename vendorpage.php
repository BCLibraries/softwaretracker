<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vendor Page</title>
    </head>
   <?PHP 
    require_once '/apps/softwaretracker/scripts/navbar.php';
    require_once '/apps/softwaretracker/scripts/loadvendor.php';
    require_once '/apps/softwaretracker/scripts/listsoftwarebyvendor.php';
    ?>
    <?PHP if ($_SESSION["role"] === 'admin'): ?>
        <script src='js/deletevendor.js' type='text/javascript'></script>
    <?PHP endif; ?>
    <script src="js/textswitch.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/mainstyle.css" type="text/css">  
    <body>
        <?PHP navbar(); ?>
        <h1>Entry Details</h1>
            <table>
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
            <button type="button" onclick="textSwitch('softlist')">Toggle</button>
            <ul id="softlist" style="display:none">
                <?php listSoftwareByVendor($_GET["vendor"]);?>
            </ul>
            <br>

        <h1>Modify Vendor</h1>
            <button type="button" onclick="textSwitch('modify-vendor')">Toggle</button>
            <div id="modify-vendor">               
            <form action="/softwaretracker/confirm.php" method='POST'>
                <input type="hidden" name="src" value="updatevendor">
               <fieldset>
                    <legend>Please enter your data</legend>
                    <input type="text" name="vendor_name" value="<?PHP echo $entry["vendor_name"]; ?>" readonly>
                    <input type="text" name="contact_first" placeholder="Contact First Name">
                    <input type="text" name="contact_last" placeholder="Contact Last Name">
                    <input type="tel" name="contact_phone" placeholder="Contact Phone">
                    <input type="text" name="email" placeholder="Contact Email">
                    <input type="tel" name="general_phone" placeholder="General Phone">
                </fieldset>
                <fieldset>
                 <legend>Additional Notes</legend>
                    <textarea name="notes" placeholder="Enter comments"></textarea>
                </fieldset>
                <br>
                <input class="panel-button" type="submit" value="Update Entry">
            </form>
            </div>

         <?PHP if ($_SESSION["role"] === 'admin'){
        echo "<h1>Delete Vendor</h1>";
        echo "<button onclick='deleteVendor(\"$entry[vendor_name]\")' type='button'>Delete</button>";}?> 
    </body>
</html>
