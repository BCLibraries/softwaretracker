<?php
function navbar(){
if ($_SESSION["role"] == "admin"):?>
<ul class="navbar">
    <li class='navbar'><a class='navbar' href='/softwaretracker/homepage.php'>Home</a></li>
    <li class='navbar'><a class="navbar" href='/softwaretracker/fulllist.php'>List</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/expenseoverview.php'>Expenses</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/renewalupcoming.php'>Renewals</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/create.php'>Create</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/findentry.php'>Find</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/manageusers.php'>Users</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/scripts/logout.php'>Log Out</a></li>
    <li id='search-li' class='navbar'><form class='navbar' action='/softwaretracker/searchresults.php'><input type='search' name='software' id='navbar-search' onkeyup='debounceAutocomplete(750, "navbar-search")();' placeholder='Search Software'></form></li>
</ul>
<?PHP else : ?>
<ul class='navbar'>
    <li class='navbar'><a class='navbar' href='/softwaretracker/homepage.php'>Home</a></li>
    <li class='navbar'><a class="navbar" href='/softwaretracker/fulllist.php'>List</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/expenseoverview.php'>Expenses</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/renewalupcoming.php'>Renewals</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/create.php'>Create</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/findentry.php'>Find</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/userpage.php'>Account</a></li>
    <li class='navbar'><a class='navbar' href='/softwaretracker/scripts/logout.php'>Log Out</a></li>
    <li id='search-li' class='navbar'><form action='/softwaretracker/searchresults.php'><input type='search' name='software' id='navbar-search' onkeyup='debounceAutocomplete(750, "navbar-search")();' placeholder='Search Software'></form></li>
</ul>
<?PHP endif;
}