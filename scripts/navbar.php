<?php
function navbar(){
if ($_SESSION["role"] == "Admin"):?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<ul class="nav navbar-nav">
    <li><a href='homepage.php'>Home</a></li>
    <li><a href='fulllist.php'>Entries</a></li>
    <li><a href='create.php'>Create Entries</a></li>
    <li><a href='reportscomplete.php'>Renewals</a></li>
    <li><a href="expenseoverview.php">Expenses</a></li>
    <li><a href='findentry.php'>Find</a></li>
    <li><a href='manageusers.php'>Manage Users</a></li>
    <li><a href='scripts/logout.php'>Log Out</a></li>
</ul>
    <form class="navbar-form navbar-right" method="POST" action='searchresults.php'><div class="form-group"><input type='text' class="form-control" name='searchterm' id='navbar-search' placeholder='Search'></div></form>
</div>
</nav>
<?PHP else : ?>
<nav class="navbar navbar-default">
<div class="container-fluid">
<ul class="nav navbar-nav">
    <li><a href='homepage.php'>Home</a></li>
    <li><a href='fulllist.php'>Entries</a></li>
    <li><a href='create.php'>Create Entries</a></li>
    <li><a href='reportscomplete.php'>Renewals</a></li>
    <li><a href="expenseoverview.php">Expenses</a></li>
    <li><a href='findentry.php'>Find</a></li>
    <li><a href='userpage.php'>Update Account</a></li>
    <li><a href='scripts/logout.php'>Log Out</a></li>
   </ul>
    <form class="navbar-form navbar-right" method="POST" action='searchresults.php'><div class="form-group"><input type='text' class="form-control" name='searchterm' id='navbar-search' placeholder='Search'></div></form>
</div>
</nav>
<?PHP endif;
}