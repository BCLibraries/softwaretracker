<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Search Results</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css">
        <?php 
        require_once 'scripts/navbar.php';
        require_once 'scripts/tableupcomingrenewals.php';
        require_once 'scripts/tablesearchresults.php';
        require_once 'scripts/listsoftwarebyvendor.php';
        require_once 'scripts/listsoftwarebycategory.php';
        require_once 'scripts/tablerenewalsbyrange.php';
        require_once 'scripts/tablemissingvendor.php';
        require_once 'scripts/tablemissingcost.php';
        require_once 'scripts/tablemissingrenewal.php';
        require_once 'scripts/tablemissingfunding.php';
        require_once 'scripts/tablerequestedby.php';
        ?>     
    </head>
    <body>
        <?PHP navbar()?>
        <div class="container">

        <?php
            if (isset($_POST["searchterm"])){
                tableSearchResults($_POST["searchterm"]);
            }
            elseif (isset($_POST['byvendor'])){
                    echo listSoftwareByVendor($_POST["vendor"]);
                }
            elseif (isset($_POST["bycategory"])){
                listSoftwareByCategory($_POST["category"]);
            }
            elseif (isset($_POST['byrequester'])){
                tableRequestedBy($_POST['requester']);
            }
            elseif (isset($_POST['upcomingrenewals'])){
                tableUpcomingRenewals($_POST["days"]);
            }
            elseif (isset($_POST['rangerenewals'])){
                tableRenewalsByRange($_POST["date1"],$_POST['date2']);
            }
            elseif (isset($_POST['partialentries'])){ 
                if ($_POST["missingfield"] === "cost"){
                    tableMissingCost();
                }
                elseif ($_POST["missingfield"] === "vendor"){
                    tableMissingVendor();
                }
                 elseif ($_POST["missingfield"] === "funding"){
                    tableMissingFunding();
                }
                 elseif ($_POST["missingfield"] === "renewal"){
                    tableMissingRenewal();
                }
            }
        else {
            echo "<p>No results found.</p>";
        }
        ?>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
