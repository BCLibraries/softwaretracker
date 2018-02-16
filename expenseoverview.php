<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Review Expenses</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="js/downloadreport.js" type="text/javascript"></script>
        <?PHP 
        require_once 'scripts/navbar.php';
        require_once 'scripts/countfunding.php';
        require_once 'scripts/sumfunding.php';
        require_once 'scripts/countenvironment.php';
        require_once 'scripts/sumenvironment.php';
        ?>
    </head>
    <body>
        <?PHP navbar() ?>
        <div class="container">
        <?PHP require_once 'scripts/expensebar.php';?>
        <h1>Overview of Expenses</h1>
        <p>The tables below summarize expenses for the current fiscal year based on a start date of June 3rd.</p>
        <h2>Summary By Funding Source</h2>
        <table class="table table-hover">
            <tr><th>Funding Source</th><th>Number of Items</th><th>Total Cost</th></tr>
            <tr><td>Operations</td><td><?PHP countFunding('operations'); ?></td><td><?PHP sumFunding('operations'); ?></td></tr>
            <tr><td>Technology</td><td><?PHP countFunding('technology')?></td><td><?PHP sumFunding('technology')?></td></tr>
            <tr><td>ITS</td><td><?PHP countFunding('ITS')?></td><td><?PHP sumFunding('ITS')?></td></tr>
            <tr><td>CTE</td><td><?PHP countFunding('CTE')?></td><td><?PHP sumFunding('CTE')?></td></tr>
            <tr><td>Open Source</td><td><?PHP countFunding('OpenSource')?></td><td><?PHP sumFunding('OpenSource')?></td></tr>
            <tr><td>Unclassified</td><td><?PHP countFunding('Unsorted')?></td><td><?PHP sumFunding('')?></td></tr>
        </table>
        <h2>Summary By Environment</h2>
        <table class="table table-hover">
            <tr><th>Environment</th><th>Number of Items</th><th>Total Cost</th></tr>
            <tr><td>Public</td><td><?PHP countEnvironment('Public')?></td><td><?PHP sumEnvironment('Public')?></td></tr>
            <tr><td>Staff</td><td><?PHP countEnvironment('Staff')?></td><td><?PHP sumEnvironment('Staff')?></td></tr>
            <tr><td>Classroom</td><td><?PHP countEnvironment('Classroom')?></td><td><?PHP sumEnvironment('Classroom')?></td></tr>
        </table>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    </body>
</html>
