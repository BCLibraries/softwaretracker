<?php
function listSoftwareGroups($software){

/*Load all software groups for a given program*/    
require_once '/makedbconnection.php';
$connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
$sql = "SELECT group_name FROM software_groups WHERE software_name='$software';";
$result = $connection->query($sql);

/*Write a list of groups that the software belongs to*/
$dom = new DOMDocument;
$ul = $dom->createElement("ul");
$ul->setAttribute("class", "list-group");
while ($row = $result->fetch_assoc()){
    $item = $dom->createElement("li");
    $item->setAttribute("class", 'list-group-item');
    $group = $row["group_name"];
    $text = $dom->createTextNode($group);
    $item->appendChild($text);
    $ul->appendChild($item);
}
$dom->appendChild($ul);
echo $dom->saveHTML();
}
