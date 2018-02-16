<?php?>
<div class="btn-group">
    <button class="btn btn-default" onclick="window.location.href='entrypage.php?entry=<?PHP echo $_GET["entry"]?>'">Entry Details</button>
    <button class="btn btn-default" onclick="window.location.href='deployment.php?entry=<?PHP echo $_GET["entry"]?>'">View/Assign Licenses</button>
    <button class="btn btn-default" onclick="window.location.href='licenseaddnew.php?entry=<?PHP echo $_GET["entry"]?>'">Add Licenses</button>
</div>
