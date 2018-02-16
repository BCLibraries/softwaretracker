<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Software Entry</title>
    <?PHP 
    require_once 'scripts/navbar.php';
    require_once 'scripts/loadentry.php';
    require_once 'scripts/optionallvendors.php';
    require_once 'scripts/loadvendor.php';
    require_once 'scripts/optionallcategories.php';
    require_once 'scripts/optionallenvironments.php';
    require_once 'scripts/optionallfundingsources.php';
    require_once 'scripts/checkmembership.php';
    require_once 'scripts/loadlocations.php';
    require_once 'scripts/tableentrylocation.php';
    require_once 'scripts/loadsoftwaregroups.php';
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/deleteentry.js" type="text/javascript"></script>
    <?PHP $entry = loadEntry($_GET["entry"]);
    $vendordata = loadVendor($entry["vendor"]);?>
   
    <body>
        <?PHP navbar(); ?>
        <div class="container">
        <?PHP require_once "scripts/softwarebar.php";?>
        <h1>Entry Details</h1>
        <table class="table table-hover">
            <tr><td>Software:</td><td><?PHP echo $entry["software"] ?></td></tr>
            <tr><td>Category:</td><td><?PHP echo $entry["category"] ?></td></tr>
            <tr><td>Environment:</td><td><?PHP echo $entry["environment"] ?></td></tr>
            <tr><td>Platform:</td><td><?PHP echo $entry["platform"] ?></td></tr>
            <tr><td>Requested By:</td><td><?PHP echo $entry["requester"] ?></td></tr>
            <tr><td>Approved By:</td><td><?PHP echo $entry["approver"] ?></td></tr>
            <tr><td>Funding Source:</td><td><?PHP echo $entry["funding_source"] ?></td></tr>
            <tr><td>Primary User:</td><td><?PHP echo $entry["primary_user"] ?></td></tr>
            <tr><td>Vendor:</td><td><?PHP echo "<a href='vendorpage.php?vendor=$entry[vendor]'>$entry[vendor]</a>" ?></td></tr>
            <tr><td>Invoice #</td><td><?PHP echo $entry["invoice"] ?></td></tr>
            <tr><td>Voucher #</td><td><?PHP echo $entry["voucher"] ?></td></tr>
            <tr><td>Contact:</td><td><?PHP echo $vendordata["contact_first"]." ".$vendordata["contact_last"]?></td></tr>
            <tr><td>Email:</td><td><?PHP echo "<a href='mailto:$vendordata[email]'>$vendordata[email]</a>"?></td></tr>
            <tr><td>Cost:</td><td><?PHP echo $entry["cost"] ?></td></tr>
            <tr><td>Renewal Date:</td><td><?PHP echo $entry["renewal"] ?></td></tr>
            <tr><td>Purchase Date:</td><td><?PHP echo $entry["purchase"] ?></td></tr>
            <tr><td>Notes:</td><td><?PHP echo $entry["notes"] ?></td></tr>
        </table>
        <?PHP tableEntryLocation($entry["software"]); ?>
        <br>                
        <h1>Modify Entry</h1>
        <form action="confirm.php" method='POST'>
            <input class="form-control" type="text" name="software" value="<?PHP echo $entry["software"]?>" readonly>
            <select class="form-control" name="category">
                <option value="">Category</option>
                <?PHP optionAllCategories();?>
            </select>
            <select class="form-control" name="environment">
                <option value="">Environment</option>
                <?PHP optionAllEnvironments();?>
            </select>
            <p>Located in Areas:</p>
            <?PHP loadLocations();?><br>
            <select class="form-control" name="platform">
                <option value="">Platform</option>
                <option value="Mac">Mac</option>
                <option value="PC">PC</option>
                <option value="Both">Both</option>
            </select>
            <select class="selectusername form-control" name="requester">
                <option value="">Requester</option>
            </select>
            <select class="selectusername form-control" name="approver">
                <option value="">Approver</option>
            </select>
            <select class="form-control" name="funding">
                <option value="">Funding</option>
                <?PHP optionAllFundingSources();?>
            </select>
            <select class="selectusername form-control" name="primary">
                <option value="">Primary User</option>
            </select>
            <select class="form-control" type="text" name="vendor">
                <option value="">Vendor</option>
                <?PHP optionAllVendors();?>
            </select>
            <input class="form-control" type="text" name="invoice" placeholder="Invoice"><br>
            <input class="form-control" type="text" name="voucher" placeholder="Voucher"><br>
            <input class="form-control" type="number" step=".01" name="cost" placeholder="Cost"><br>
            <label for="renewal">Renewal Date</label><br>
            <input class="form-control" type="date" name="renewal"><br>
            <label for="purchase">Purchase Date</label><br>
            <input class="form-control" type="date" name="purchase"> 
            <legend>Additional Notes</legend>
            <textarea class="form-control" name="notes" rows="20" cols="100" placeholder="Enter comments"></textarea>
            <button class="btn btn-default" name="updateentry" type="submit">Update Entry</button>
    </form>

    <h1>Delete Entry</h1>
    <button class="btn btn-default" type='button' onclick="deleteEntry('<?PHP echo $entry["software"]?>')">Delete Entry</button>
    </div>

    <script src="js/optionusernames.js"></script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</body>
</html>
