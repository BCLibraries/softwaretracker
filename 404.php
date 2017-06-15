<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link type="text/css" rel="stylesheet" href="css/mainstyle.css">
    <?PHP require_once '/apps/softwaretracker/scripts/navbar.php';?>
</head>
<body>
    <?php navbar(); ?>
    <h1>Whoops!</h1>
    <img src='images/lostcat.jpg'>
    <p>Not sure what you were lookin' for, but we couldn't find it.</p>
    <p>Better head back to the <a href='/softwaretracker/homepage.php'>homepage</a>.</p>
</body>
</html>
