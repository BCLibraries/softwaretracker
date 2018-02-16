<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Lookup A Tracked Entry</title>
        <?PHP require_once 'scripts/navbar.php';
        require_once 'scripts/optionallvendors.php';
        require_once 'scripts/optionallcategories.php';
        require_once 'scripts/tablemissingfunding.php';
        require_once 'scripts/tablemissingcost.php';
        require_once 'scripts/tablemissingvendor.php';
        require_once 'scripts/tablemissingrenewal.php';
        ?>
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <?PHP navbar(); ?>
        <div class='container'>

        <h1>View Software By Category</h1>
        <form action='searchresults.php' method="POST">
            <select class="form-control" type="text" name="category">
                <option value="">Select A Category</option>
                <?PHP optionAllCategories();?>
            </select>
            <button class="btn btn-default" type="submit" name="bycategory">View</button>
        </form>

        <h1>View Software By Vendor</h1>
        <form action="searchresults.php" method="POST">
            <select class="form-control" type="text" name="vendor">
                <option value="">Select Vendor</option>
                <?PHP optionAllVendors();?>
            </select>
            <button class="btn btn-default" type="submit" name="byvendor">View</button>
        </form>

        <h1>View Software By Requester</h1>
        <form action="searchresults.php" method="POST">
            <select class="form-control selectusername" name="requester">
                <option>Select A Requester</option>
            </select>
            <button class="btn btn-default" name="byrequester" type="submit">View</button>
        </form>

        <h1>View Vendor Information</h1>
        <form action="vendorpage.php">
            <select class="form-control" name="vendor">
                <option>Select Vendor</option>
                <?PHP optionAllVendors();?>
            </select>
            <button class="btn btn-default" type="submit">View</button>
        </form>

        <h1>Partial Entries</h1>
        <p>Show entries missing the selected field.</p>
        <form action="searchresults.php" method="POST">
            <select class="form-control" name="missingfield">
                <option>Select Field</option>
                <option value="cost">Cost</option>
                <option value="vendor">Vendor</option>
                <option value="renewal">Renewal</option>
                <option value="funding">Funding Source</option>
            </select>
            <button class="btn btn-default" name="partialentries" type="submit">View</button>
        </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/optionusernames.js"></script>
        <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames"></script>
</body>
</html>
