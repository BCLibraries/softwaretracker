<?php
function tableAllLocations(){
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

/*Load the software names*/
$namesql = "SELECT software FROM tracked;";
$namelist = $connection->query($namesql);

while ($name = $namelist->fetch_assoc()){
/*Create the entry row*/
$entryrow = $dom->createElement("TR");
$table->appendChild($entryrow);
$entry = $dom->createElement("TD");
$entryrow->appendChild($entry);
$entrylink = $dom->createElement("A", "$name[software]");
$entrylink->setAttribute("HREF", "/softwaretracker/entrypage.php?entry=$name[software]");
$entry->appendChild($entrylink);

/*Prepare some variables*/
$yes = "/softwaretracker/images/check.png";
$no = "/softwaretracker/images/redx.png";

/*Loop through the locations*/
    $result->data_seek(0);
    while ($test = $result->fetch_assoc()){
        $locationcheck = $dom->createElement("TD");
        $locationimage = $dom->createElement("IMG");
        $locationcheck->appendChild($locationimage);
        $sql = "SELECT location FROM locations WHERE software='$name[software]' AND location='$test[entry]';";
        $testresult = $connection->query($sql);
        if ($testresult->num_rows === 1) {
            $locationimage->setAttribute("SRC", $yes);
        }
        else {
            $locationimage->setAttribute("SRC", $no);
        }
        $entryrow->appendChild($locationcheck);
    }
}
echo $dom->saveHTML();
}
