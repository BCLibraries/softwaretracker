<?PHP require_once '/apps/softwaretracker/scripts/authorize.php';
require_once '/apps/softwaretracker/scripts/config.php';

if (isset($_GET["report"])){
$report = filter_input(INPUT_GET, "report", FILTER_SANITIZE_STRING);
$user = filter_var($_SESSION['username']);
    if ($report === "full") {
        $target = DOC_DIR."/$user/expensereport.csv";
       }
    elseif ($report === "Technology"){
        $target = DOC_DIR."/$user/Technology.csv";
        }
    elseif ($report === "Operations"){
        $target = DOC_DIR."/$user/Operations.csv";
        }
    elseif ($report === "CTE"){
        $target = DOC_DIR."/$user/CTE.csv";
        }
    elseif ($report === "ITS"){
        $target = DOC_DIR."/$user/ITS.csv";
        }
    elseif ($report === "OpenSource"){
        $target = DOC_DIR."/$user/OpenSource.csv";
        }
    elseif ($report === "Unsorted"){
        $target = DOC_DIR."/$user/Unsorted.csv";
        }
    elseif ($report === "Upcoming"){
        $days = filter_input(INPUT_GET, "days", FILTER_SANITIZE_NUMBER_INT);
        $target = DOC_DIR."/$user/Upcoming$days.csv";
    }
    else {
        exit ("Could not find download.");
    }
}
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($target).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($target));
readfile($target);
?>

