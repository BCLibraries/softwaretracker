<?php
function tableAllLocations(){
require_once "makedbconnection.php";
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT entry FROM appdata WHERE field='location';";
$result = $connection->query($sql);

/*Create the table*/
$dom = new DOMDocument;
    $div = $dom->createElement("DIV");
    $div->setAttribute("CLASS", "container-fluid");
    $dom->appendChild($div);
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "table table-hover");
    $table->setAttribute("ID", "table-all-locations");
    $div->appendChild($table);
    $headrow = $dom->createElement("TR");
    $thead = $dom->createElement("THEAD");
    $thead->appendChild($headrow);
    $table->appendChild($thead);

/*Create the table headings*/
$thsoftware = $dom->createElement("TH", "Software");
$headrow->appendChild($thsoftware);
while ($row = $result->fetch_assoc()){
    $thlocation = $dom->createElement("TH", $row["entry"]);
    $headrow->appendChild($thlocation);
}

/*Create the table body*/
$tbody = $dom->createElement("TBODY");
$table->appendChild($tbody);

/*Load the software names*/
$namesql = "SELECT software FROM tracked;";
$namelist = $connection->query($namesql);

while ($name = $namelist->fetch_assoc()){
/*Create the entry row*/
$entryrow = $dom->createElement("TR");
$tbody->appendChild($entryrow);
$entry = $dom->createElement("TD");
$entryrow->appendChild($entry);
$entrylink = $dom->createElement("A", "$name[software]");
$entrylink->setAttribute("HREF", "entrypage.php?entry=$name[software]");
$entry->appendChild($entrylink);

/*Loop through the locations*/
    $result->data_seek(0);
    while ($test = $result->fetch_assoc()){
        $sql = "SELECT location FROM locations WHERE software='$name[software]' AND location='$test[entry]';";
        $testresult = $connection->query($sql);
        $locationtd = $dom->createElement("TD");
        $locationmark = $dom->createElement("I");
        $locationstatus = $dom->createElement("SPAN");
        $locationstatus->setAttribute("STYLE", "display:none;");
        $locationtd->appendChild($locationstatus);
        $locationtd->appendChild($locationmark);
        if ($testresult->num_rows === 1) {
            $locationmark->setAttribute("CLASS","fa fa-check");
            $locationstatus->appendChild($dom->createTextNode("1"));
        }
        else {
            $locationmark->setAttribute("CLASS","fa fa-times");
            $locationstatus->appendChild($dom->createTextNode("0"));
        }
        $entryrow->appendChild($locationtd);
    }
}
echo $dom->saveHTML();
}
