<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create A New Vendor Entry</title>
    <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';?>
    <link rel="stylesheet" href="css/mainstyle.css" type="text/css">  
</head>
<body>
    <?PHP navbar(); ?>
    <?PHP require_once '/apps/softwaretracker/scripts/homebar.php' ?>
    <h1>Create a Vendor Entry</h1>
    <form action="confirm.php" method="POST">
        <fieldset>
            <input type="hidden" name="src" value="newvendor">
            <input type="text" name="vendor" placeholder="Vendor Name*" required>
            <input type="text" name="contact_first" placeholder="First Name">
            <input type="text" name="contact_last" placeholder="Contact Last Name">
            <input type="text" name="email" placeholder="Contact Email">
            <input type="tel" name="contact_phone" placeholder="Contact #">
            <input type="tel" name="general_phone" placeholder="General #">
        </fieldset>
        <p>* required fields</p>
        <fieldset>
            <textarea name="vendornotes" placeholder="Additional comments"></textarea>
        </fieldset>
        <br>
        <input class="panel-button" type="submit" value="Create Entry">
    </form>
</body>
</html>
