<?php
function tableDeploymentData($software){
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    
    $sql = "SELECT * FROM licenses WHERE software='$software';";
    $results = $connection->query($sql);
    
    
    /*Write the table*/
    $dom = new DOMDocument;
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "deployment");
    $dom->appendChild($table);
    $headrow = $dom->createElement("TR");
    $table->appendChild($headrow);
    
    /*Create the headings*/
    $thkey = $dom->createElement("TH", "Key");
    $headrow->appendChild($thkey);
    $thlocation = $dom->createElement("TH", "Location");
    $headrow->appendChild($thlocation);
    $thusername = $dom->createElement("TH", "Username");
    $headrow->appendChild($thusername);
    $thhostname = $dom->createElement("TH", "Hostname");
    $headrow->appendChild($thhostname);
    $thdatedeployed = $dom->createElement("TH", "Date Deployed");
    $headrow->appendChild($thdatedeployed);
    $thplatform = $dom->createElement("TH", "Platfrom");
    $headrow->appendChild($thplatform);
    $thassign = $dom->createElement("TH", "Assign");
    $headrow->appendChild($thassign);
    
    /*Create the data rows*/
    while ($row = $results->fetch_assoc()){   
        $datarow = $dom->createElement("TR");
        
        $key = $dom->createElement("TD", "$row[licensekey]");
        $datarow->appendChild($key);
        
        $location = $dom->createElement("TD", "$row[location]");
        $datarow->appendChild($location);
        
        $username = $dom->createElement("TD", "$row[username]");
        $datarow->appendChild($username);
        
        $hostname = $dom->createElement("TD", "$row[hostname]");
        $datarow->appendChild($hostname);
        
        $datedeployed = $dom->createElement("TD", "$row[datedeployed]");
        $datarow->appendChild($datedeployed);
        
        $platform = $dom->createElement("TD", "$row[platform]");
        $datarow->appendChild($platform);
        
        $assign = $dom->createElement("TD");
        $datarow->appendChild($assign);
        if($row["username"]==="" || is_null($row["username"])){
            $assignlink = $dom->createElement("A", "Assign");
            $assign->appendChild($assignlink);
            $assignlink->setAttribute("HREF", "licenseassign.php?licensekey=$row[licensekey]&id=$row[id]&software=$software");
        }
        else {
            $revokebutton = $dom->createElement("BUTTON", "Revoke");
            $assign->appendChild($revokebutton);
            $revokebutton->setAttribute("ONCLICK", "revokeLicense('$row[id]')");
        }
        /*The revoke function is handled by a javascript called licenserevoke.js*/
        $table->appendChild($datarow);
    }

echo  $dom->saveHTML();  
}