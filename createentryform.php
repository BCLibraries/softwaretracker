<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create A New Tracking Entry</title>
        <?PHP require_once 'scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/optionallvendors.php';
        require_once '/apps/softwaretracker/scripts/optionallcategories.php';
        require_once '/apps/softwaretracker/scripts/optionallenvironments.php';
        require_once '/apps/softwaretracker/scripts/optionallfundingsources.php';
        require_once '/apps/softwaretracker/scripts/checkboxeslocation.php';
        ?>
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <script src='js/textswitch.js' type='text/javascript'></script>
    </head>
    <body>
        <?PHP navbar(); ?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
        <h1>Create an Entry</h1>
        <form action="confirm.php" method='POST' enctype="multipart/form-data">
                <input type="hidden" name="src" value="newsoftware">
                <input type="text" name="software" placeholder="Software Name*" required><br>
                <select name="category">
                    <option value="">Category</option>
                    <?PHP optionAllCategories();?>
                </select><br>
                <select name="environment">
                    <option value="">Environment</option>
                    <?PHP optionAllEnvironments();?>
                </select><br>
                <select name="platform">
                    <option value="">Platform</option>
                    <option value="Mac">Mac</option>
                    <option value="PC">PC</option>
                    <option value="Both">Both</option>
                </select><br>
                <p>Location (check all that apply)</p>
                    <?PHP checkboxesLocations(); ?>
                <select class="selectusername" name="requester">
                    <option value="">Requester</option>
                </select><br>
                <select class="selectusername" name="approver">
                    <option value="">Approver</option>
                </select><br>
                <select name="funding">
                    <option value="">Funding</option>
                    <?PHP optionAllFundingSources();?>
                </select><br>
                <select class="selectusername" name="primary">
                    <option value="">Primary User</option>
                </select><br>
                <select type="text" name="vendor">
                    <option value="">Vendor**</option>
                    <?PHP optionAllVendors();?>
                </select><br>
                <input type="number" name="cost" placeholder="Cost"><br>
                <label for="renewal">Renewal Date</label><br>
                <input type="date" name="renewal" placeholder="Renewal Year-Month-Day"><br>
                <label for="purchase">Purchase Date</label><br>
                <input type="date" name="purchase" placeholder="Purchase Year-Month-Day"><br>
                <label for="group[]">Select which group(s) can edit this entry: </label><br>
                <input enctype="multipart/form-data" name="group[]" type="checkbox" value="CTE">CTE<br>
                <input enctype="multipart/form-data" name="group[]" type="checkbox" value="ITS">ITS<br>
                <input enctype="multipart/form-data" name="group[]" type="checkbox" value="Library" checked>Library<br>
            <textarea name="notes" placeholder="Additional comments"></textarea>
            <p>* required fields</p>
            <p>** if the desired vendor is not listed, then click to show the optional fields</p>
            <button type='button' onclick="textSwitch('optional-vendor')">Optional Fields</button>
            <br>
            <div class="optional-vendor hidden">
                <input type="text" name="optionalvendor" placeholder="Vendor Name">
                <input type="text" name="contact_first" placeholder="Contact First Name">
                <input type="text" name="contact_last" placeholder="Contact Last Name">
                <input type="text" name="email" placeholder="Contact Email">
                <textarea name="vendornotes" placeholder="Vendor Comments"></textarea>
            </div>
            <br>
            <button type="submit">Create Entry</button>
        </form>
    </body>
    <script src="js/optionusernames.js">
    </script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames">
    </script>
</html>