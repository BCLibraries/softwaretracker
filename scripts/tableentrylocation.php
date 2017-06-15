<?php
function tableEntryLocation($arg){
require_once "/apps/softwaretracker/scripts/makedbconnection.php";
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT entry FROM appdata WHERE field='location';";
$result = $connection->query($sql);

/*Create the table*/
$dom = new DOMDocument;
$table = $dom->createElement("TABLE");
$table->setAttribute("CLASS", "deployment");
$dom->appendChild($table);
$headrow = $dom->createElement("TR");
$table->appendChild($headrow);

/*Create the table headings*/
$thsoftware = $dom->createElement("TH", "Software");
$headrow->appendChild($thsoftware);
while ($row = $result->fetch_assoc()){
    $thlocation = $dom->createElement("TH", $row["entry"]);
    $headrow->appendChild($thlocation);
}

/*Create the entry row*/
$entryrow = $dom->createElement("TR");
$table->appendChild($entryrow);
$entry = $dom->createElement("TD", "$arg");
$entryrow->appendChild($entry);

/*Prepare some variables*/
$yes = "/softwaretracker/images/check.png";
$no = "/softwaretracker/images/redx.png";

/*Loop through the locations*/
$result->data_seek(0);
while ($test = $result->fetch_assoc()){
    $locationcheck = $dom->createElement("TD");
    $locationimage = $dom->createElement("IMG");
    $locationcheck->appendChild($locationimage);
    $sql = "SELECT location FROM locations WHERE software='$arg' AND location='$test[entry]';";
    $testresult = $connection->query($sql);
    if ($testresult->num_rows === 1) {
        $locationimage->setAttribute("SRC", $yes);
    }
    else {
        $locationimage->setAttribute("SRC", $no);
    }
    $entryrow->appendChild($locationcheck);
}
echo $dom->saveHTML();
}