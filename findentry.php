<!DOCTYPE html>
<?PHP require_once 'scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lookup A Tracked Entry</title>
        <?PHP require_once 'scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/optionallvendors.php';
        require_once '/apps/softwaretracker/scripts/optionallcategories.php';
        require_once '/apps/softwaretracker/scripts/tablemissingfunding.php';
        require_once '/apps/softwaretracker/scripts/tablemissingcost.php';
        require_once '/apps/softwaretracker/scripts/tablemissingvendor.php';
        require_once '/apps/softwaretracker/scripts/tablemissingrenewal.php';
        ?>
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <script src='js/textswitch.js' type="text/javascript"></script>
        <script src="js/showtable.js" type="text/javascript"></script>
        <script src="js/hidetable.js" type="text/javascript"></script>
    </head>
    <body>
        <?PHP navbar(); ?>
        <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
            <form action="searchresults.php">
                    <fieldset>
                        <input type="search" name="software" id='result-target' onkeyup='debounceAutocomplete(750, "result-target")();' placeholder="Search By Software Name">
                    </fieldset>
            </form>
            <h1>View Software By Category</h1>
            <form action='searchresults.php'>
                    <select type="text" name="category">
                        <option value="">Select A Category</option>
                        <?PHP optionAllCategories();?>
                    </select>
                    <input class='panel-button' type="submit" value="Search">
            </form>
            <h1>View Software By Vendor</h1>
            <form action="searchresults.php">
                    <select type="text" name="vendor">
                        <option value="">Select Vendor</option>
                        <?PHP optionAllVendors();?>
                    </select>
                    <input class='panel-button' type="submit" value="Search">
            </form>
               
            <h1>View All Software</h1>
            <form action='searchresults.php'>
                <input name='software' value='' type="hidden">
                <input class='panel-button' type='submit' value='List All'>
            </form>

            <h1>View Vendor Information</h1>
            <form action="vendorpage.php">
                    <select type="text" name="vendor">
                        <option>Select Vendor</option>
                        <?PHP optionAllVendors();?>
                    </select>
                    <input class='panel-button' type="submit" value="Search">
            </form>
    <h1>Partial Entries</h1>
        <p>Show entries missing the selected field.</p>
        <select id="table_source">
            <option>Select Field</option>
            <option value="missingcost">Cost</option>
            <option value="missingvendor">Vendor</option>
            <option value="missingrenewal">Renewal</option>
            <option value="missingfunding">Funding Source</option>
        </select>
        <button type="button" onclick="showTable()">Show Entries</button><br>
        
        <?PHP tableMissingCost();?><br>
        <button class="missingcost hidden" type="button" onclick="hideTable('missingcost')">Hide</button><br>
        
        <?PHP tableMissingVendor();?><br>
        <button class="missingvendor hidden" type="button" onclick="hideTable('missingvendor')">Hide</button><br>
        
        <?PHP tableMissingRenewal();?><br>
        <button class="missingrenewal hidden" type="button" onclick="hideTable('missingrenewal')">Hide</button><br>
        
        <?PHP tableMissingFunding();?><br>
        <button class="missingfunding hidden" type="button" onclick="hideTable('missingfunding')">Hide</button><br>
    </body>
    <script src='js/getautocomplete.js' type='text/javascript'></script>
    <script src='js/debouncefunction.js' type='text/javascript'></script>
</html>
