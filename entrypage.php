<!DOCTYPE Html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    
        <meta charset="UTF-8">
        <title>Software Entry</title>
        <?PHP 
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/loadentry.php';
        require_once '/apps/softwaretracker/scripts/optionallvendors.php';
        require_once '/apps/softwaretracker/scripts/loadvendor.php';
        require_once '/apps/softwaretracker/scripts/optionallcategories.php';
        require_once '/apps/softwaretracker/scripts/optionallenvironments.php';
        require_once '/apps/softwaretracker/scripts/optionallfundingsources.php';
        require_once '/apps/softwaretracker/scripts/checkmembership.php';
        require_once '/apps/softwaretracker/scripts/listsoftwaregroups.php';
        require_once '/apps/softwaretracker/scripts/loadlocations.php';
        require_once '/apps/softwaretracker//scripts/tableentrylocation.php';
        ?>
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">  
        <script src="js/textswitch.js" type="text/javascript"></script>
        <?PHP $entry = loadEntry($_GET["entry"]);
        $vendordata = loadVendor($entry["vendor"]);
        if (checkMembership($entry["software"])){echo '<script src="js/deleteentry.js" type="text/javascript"></script>';};?>
        
    <body>
        <?PHP navbar(); ?>
        <?PHP require_once "/apps/softwaretracker/scripts/softwarebar.php";?>
        <h1>Entry Details</h1>
        <table>
            <tr><td>Software:</td><td><?PHP echo $entry["software"] ?></td></tr>
            <tr><td>Category:</td><td><?PHP echo $entry["category"] ?></td></tr>
            <tr><td>Environment:</td><td><?PHP echo $entry["environment"] ?></td></tr>
            <tr><td>Platform:</td><td><?PHP echo $entry["platform"] ?></td></tr>
            <tr><td>Requested By:</td><td><?PHP echo $entry["requester"] ?></td></tr>
            <tr><td>Approved By:</td><td><?PHP echo $entry["approver"] ?></td></tr>
            <tr><td>Funding Source:</td><td><?PHP echo $entry["funding_source"] ?></td></tr>
            <tr><td>Primary User:</td><td><?PHP echo $entry["primary_user"] ?></td></tr>
            <tr><td>Vendor:</td><td><?PHP echo "<a href='/softwaretracker/vendorpage.php?vendor=$entry[vendor]'>$entry[vendor]</a>" ?></td></tr>
            <tr><td>Contact:</td><td><?PHP echo $vendordata["contact_first"]." ".$vendordata["contact_last"]?></td></tr>
            <tr><td>Email:</td><td><?PHP echo "<a href='mailto:$vendordata[email]'>$vendordata[email]</a>"?></td></tr>
            <tr><td>Cost:</td><td><?PHP echo $entry["cost"] ?></td></tr>
            <tr><td>Renewal Date:</td><td><?PHP echo $entry["renewal"] ?></td></tr>
            <tr><td>Purchase Date:</td><td><?PHP echo $entry["purchase"] ?></td></tr>
            <tr><td>Notes:</td><td><?PHP echo $entry["notes"] ?></td></tr>
        </table>
        <?PHP tableEntryLocation($entry["software"]); ?>
        <br>                
<?php if (checkMembership($entry["software"])):?>
        <h1>Modify Entry</h1>
    <button  type="button" onclick="textSwitch('modify')">Toggle</button>
    <br>
    <div class="modify hidden"">
        <form action="/softwaretracker/confirm.php" method='POST'>
        <input type="hidden" name="src" value="updateentry"">
            <input type="text" name="software" value="<?PHP echo $entry["software"]?>" readonly>
            <select name="category">
                <option value="">Category</option>
                <?PHP optionAllCategories();?>
            </select>
            <select name="environment">
                <option value="">Environment</option>
                <?PHP optionAllEnvironments();?>
            </select>
            <p>Deployed to:</p>
            <?PHP loadLocations();?><br>
            <select name="platform">
                <option value="">Platform</option>
                <option value="Mac">Mac</option>
                <option value="PC">PC</option>
                <option value="Both">Both</option>
            </select>
            <select class="selectusername" name="requester">
                <option value="">Requester</option>
            </select>
            <select class="selectusername" name="approver">
                <option value="">Approver</option>
            </select>
            <select name="funding">
                <option value="">Funding</option>
                <?PHP optionAllFundingSources();?>
            </select>
            <select class="selectusername" name="primary">
                <option value="">Primary User</option>
            </select>
            <select type="text" name="vendor">
                <option value="">Vendor</option>
                <?PHP optionAllVendors();?>
            </select>
            <input type="number" name="cost" placeholder="Cost"><br>
           <label for="renewal">Renewal Date</label><br>
           <input type="date" name="renewal"><br>
           <label for="purchase">Purchase Date</label><br>
           <input type="date" name="purchase"> 
         <legend>Additional Notes</legend>
            <textarea name="notes" rows="20" cols="100" placeholder="Enter comments"></textarea>
        <p>Edited By:</p>
        <ul class='group-list'>
        <?PHP listSoftwareGroups($entry["software"]);?>
        </ul>
        <br>
            <label for="group[]">Add to Group</label><br>
            <input enctype="multipart/form-data" name="group[]" type="checkbox" value="Library">Library<br>
            <input enctype="multipart/form-data" name="group[]" type="checkbox" value="ITS">ITS<br>
            <input enctype="multipart/form-data" name="group[]" type="checkbox" value="CTE">CTE<br>
            <label for="removegroup[]">Remove from a Group</label><br>
            <input enctype="multipart/form-data" name="removegroup[]" type="checkbox" value="Library">Library<br>
            <input enctype="multipart/form-data" name="removegroup[]" type="checkbox" value="ITS">ITS<br>
            <input enctype="multipart/form-data" name="removegroup[]" type="checkbox" value="CTE">CTE<br>
        <br>
        <input class="panel-button" type="submit" value="Update Entry">
    </form>
    </div>

    <h1>Delete Entry</h1>
    <button type='button' onclick="deleteEntry('<?PHP echo $entry["software"]?>')">Delete Entry</button>
<?PHP endif;?>
    </body>
    <script src="js/optionusernames.js">
    </script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames">
    </script>
</html>
