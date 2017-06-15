<?PHP
function tableByFundingSource ($source) {
    
    require_once '/apps/softwaretracker/scripts/makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "select * from tracked where funding_source='$source' order by software asc;";
    $results = $connection->query($sql);

    /*Make the Table*/
    $dom = new DOMDocument;
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "$source");
    $dom->appendChild($table);
    $headrow = $dom->createElement("TR");
    $table->appendChild($headrow);
    
     /*Create the headings*/
    $thentry = $dom->createElement("TH", "Entry");
    $headrow->appendChild($thentry);
    $thvendor = $dom->createElement("TH", "Vendor");
    $headrow->appendChild($thvendor);
    $thcost = $dom->createElement("TH", "Cost");
    $headrow->appendChild($thcost);
    $thfundingsource = $dom->createElement("TH", "Funding Source");
    $headrow->appendChild($thfundingsource);
    $threquester = $dom->createElement("TH", "Requester");
    $headrow->appendChild($threquester);
    $thapprover = $dom->createElement("TH", "Approver");
    $headrow->appendChild($thapprover);
    $thprimary = $dom->createElement("TH", "Primary User");
    $headrow->appendChild($thprimary);
    $thenvironment = $dom->createElement("TH", "Environment");
    $headrow->appendChild($thenvironment);
    $thplatform = $dom->createElement("TH", "Platform");
    $headrow->appendChild($thplatform);
    $thcategory = $dom->createElement("TH", "Category");
    $headrow->appendChild($thcategory);
    $threnewal = $dom->createElement("TH", "Renewal Date");
    $headrow->appendChild($threnewal);
    $thpurchase = $dom->createElement("TH", "Purchase");
    $headrow->appendChild($thpurchase);
    
    /*Create the data rows*/
    while ($row = $results->fetch_assoc()){   
        $datarow = $dom->createElement("TR");
        
        $entry = $dom->createElement("TD");
        $entrylink = $dom->createElement("A", "$row[software]");
        $entrylink->setAttribute("HREF", "/softwaretracker/entrypage.php?entry=$row[software]");
        $entry->appendChild($entrylink);
        $datarow->appendChild($entry);
        
        $vendor = $dom->createElement("TD");
        $vendorlink = $dom->createElement("A", "$row[vendor]");
        $vendorlink->setAttribute("HREF", "/softwaretracker/vendorpage.php?vendor=$row[vendor]");
        $vendor->appendChild($vendorlink);
        $datarow->appendChild($vendor);
        
        $cost = $dom->createElement("TD", "$row[cost]");
        $datarow->appendChild($cost);
        
        $funding = $dom->createElement("TD", "$row[funding_source]");
        $datarow->appendChild($funding);
        
        $requester = $dom->createElement("TD", "$row[requester]");
        $datarow->appendChild($requester);
        
        $approver = $dom->createElement("TD", "$row[approver]");
        $datarow->appendChild($approver);
        
        $primary = $dom->createElement("TD", "$row[primary_user]");
        $datarow->appendChild($primary);
        
        $environment = $dom->createElement("TD", "$row[environment]");
        $datarow->appendChild($environment);
        
        $platform = $dom->createElement("TD", "$row[platform]");
        $datarow->appendChild($platform);
        
        $category = $dom->createElement("TD", "$row[category]");
        $datarow->appendChild($category);
        
        $renewal = $dom->createElement("TD", "$row[renewal]");
        $datarow->appendChild($renewal);
        
        $purchase = $dom->createElement("TD", "$row[purchase]");
        $datarow->appendChild($purchase);
        
        $table->appendChild($datarow);
    }

echo  $dom->saveHTML();  
}