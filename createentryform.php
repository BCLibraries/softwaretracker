<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Create A New Tracking Entry</title>
        <?PHP require_once 'scripts/navbar.php';
        require_once 'scripts/optionallvendors.php';
        require_once 'scripts/optionallcategories.php';
        require_once 'scripts/optionallenvironments.php';
        require_once 'scripts/optionallfundingsources.php';
        require_once 'scripts/checkboxeslocation.php';
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <?PHP navbar(); ?>
        <div class="container">
        <h1>Create an Entry</h1>
        <form action="confirm.php" method='POST' enctype="multipart/form-data">
            <input class="form-control" type="text" name="software" placeholder="Software Name" required><br>
                <select class="form-control" name="category">
                    <option value="">Category</option>
                    <?PHP optionAllCategories();?>
                </select><br>
                <select class="form-control" name="environment">
                    <option value="">Environment</option>
                    <?PHP optionAllEnvironments();?>
                </select><br>
                <select class="form-control" name="platform">
                    <option value="">Platform</option>
                    <option value="Mac">Mac</option>
                    <option value="PC">PC</option>
                    <option value="Both">Both</option>
                </select><br>
                <div class="form-group">
                    <label>Location(s):</label>
                    <?PHP checkboxesLocations(); ?>
                </div>
                <select class="form-control selectusername" name="requester">
                    <option value="">Requester</option>
                </select><br>
                <select class="form-control selectusername" name="approver">
                    <option value="">Approver</option>
                </select><br>
                <select class="form-control" name="funding">
                    <option value="">Funding</option>
                    <?PHP optionAllFundingSources();?>
                </select><br>
                <select class="form-control selectusername" name="primary">
                    <option value="">Primary User</option>
                </select><br>
                <select class="form-control" type="text" name="vendor">
                    <option value="">Vendor</option>
                    <?PHP optionAllVendors();?>
                </select><br>
                <input class="form-control" type="text" name="invoice" placeholder="Invoice"><br>
                <input class="form-control" type="text" name="voucher" placeholder="Voucher"><br>
                <input class="form-control" type="number" step=".01" name="cost" placeholder="Cost"><br>
                <label for="renewal">Renewal Date</label><br>
                <input class="form-control" type="date" name="renewal" placeholder="Renewal Year-Month-Day"><br>
                <label for="purchase">Purchase Date</label><br>
                <input class="form-control" type="date" name="purchase" placeholder="Purchase Year-Month-Day"><br>
                <textarea class="form-control" name="notes" placeholder="Additional comments"></textarea><br>

            <p>If the desired vendor is not listed, then use these optional fields:</p>

            <div class="control-group">
                <input class="form-control" type="text" name="optionalvendor" placeholder="Vendor Name"><br>
                <input class="form-control" type="text" name="contact_first" placeholder="Contact First Name"><br>
                <input class="form-control" type="text" name="contact_last" placeholder="Contact Last Name"><br>
                <input class="form-control"type="text" name="email" placeholder="Contact Email"><br>
                <textarea class="form-control" name="vendornotes" placeholder="Vendor Comments"></textarea>
            </div>
            <br>
            <button class="btn btn-default" type="submit" name='newsoftware'>Create Entry</button>
        </form>
    </div>
    </body>
    <script src="js/optionusernames.js"></script>
    <script src="https://spreadsheets.google.com/feeds/cells/1dquzjiuvcKlLaPxXEmqhweFfGYDLXMegGskl9OeEe98/od6/public/values?alt=json-in-script&callback=optionUsernames"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</html>