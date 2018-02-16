<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Full List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <?PHP require_once "scripts/listallsoftware.php";
        require_once 'scripts/listallvendors.php';
        require_once 'scripts/navbar.php';?>
    </head>
    <body>
        <?PHP navbar();?>
        <div class="container">
        <div class="row">
        <div class='col-lg-6'>
            <h1>Software</h1>
            <?PHP listAllSoftware();?>
        </div>
        <div class='col-lg-6'>
            <h1>Vendors</h1>
            <?PHP listAllVendors();?>
        </div>
        </div>
        </div>
    </body>
</html>
