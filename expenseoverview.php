<!DOCTYPE html>
<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Review Expenses</title>
        <link type='text/css' href='css/mainstyle.css' rel='stylesheet'>
        <script src="js/downloadreport.js" type="text/javascript"></script>
        <?PHP 
        require_once '/apps/softwaretracker/scripts/navbar.php';
        require_once '/apps/softwaretracker/scripts/countfunding.php';
        require_once '/apps/softwaretracker/scripts/sumfunding.php';
        require_once '/apps/softwaretracker/scripts/countenvironment.php';
        require_once '/apps/softwaretracker/scripts/sumenvironment.php';
        ?>
    </head>
    <body>
        <?PHP navbar() ?>
        <?PHP require_once '/apps/softwaretracker/scripts/expensebar.php'?>
        <h1>Overview of Expenses</h1>
        <h2>Summary By Funding Source</h2>
        <table>
            <tr><th>Funding Source</th><th>Number of Items</th><th>Total Cost</th></tr>
            <tr><td>Operations</td><td><?PHP countFunding('operations')?></td><td><?PHP sumFunding('operations')?></td></tr>
            <tr><td>Technology</td><td><?PHP countFunding('technology')?></td><td><?PHP sumFunding('technology')?></td></tr>
            <tr><td>ITS</td><td><?PHP countFunding('ITS')?></td><td><?PHP sumFunding('ITS')?></td></tr>
            <tr><td>CTE</td><td><?PHP countFunding('CTE')?></td><td><?PHP sumFunding('CTE')?></td></tr>
            <tr><td>Open Source</td><td><?PHP countFunding('open_source')?></td><td><?PHP sumFunding('open_source')?></td></tr>
            <tr><td>Unclassified</td><td><?PHP countFunding('Unsorted')?></td><td><?PHP sumFunding('')?></td></tr>
        </table>
        <h2>Summary By Environment</h2>
        <table>
            <tr><th>Environment</th><th>Number of Items</th><th>Total Cost</th></tr>
            <tr><td>Public</td><td><?PHP countEnvironment('Public')?></td><td><?PHP sumEnvironment('Public')?></td></tr>
            <tr><td>Staff</td><td><?PHP countEnvironment('Staff')?></td><td><?PHP sumEnvironment('Staff')?></td></tr>
            <tr><td>Classroom</td><td><?PHP countEnvironment('Classroom')?></td><td><?PHP sumEnvironment('Classroom')?></td></tr>
        </table>
    </body>
    <script src="js/sorttable.js" type="text/javascript"></script>
</html>
