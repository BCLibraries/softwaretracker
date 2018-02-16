<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create A New Vendor Entry</title>
    <?PHP require_once 'scripts/navbar.php';?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>
    <?PHP navbar(); ?>
    <div class="container">
    <h1>Create a Vendor Entry</h1>
    <form action="confirm.php" method="POST">
        <div class="form-group">
        <input class="form-control" type="text" name="vendor" placeholder="Vendor Name" required>
        <input class="form-control" type="text" name="contact_first" placeholder="Contact First Name">
        <input class="form-control" type="text" name="contact_last" placeholder="Contact Last Name">
        <input class="form-control" type="text" name="email" placeholder="Contact Email">
        <input class="form-control" type="tel" name="contact_phone" placeholder="Contact #">
        <input class="form-control" type="tel" name="general_phone" placeholder="General #">
        <textarea class="form-control" name="vendornotes" placeholder="Additional comments"></textarea>
        </div>
        <button class="btn btn-default" type="submit" name="newvendor">Create Entry</button>
    </form>
    </div>
    <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</body>
</html>
