<?php
function tableAllData(){
    
    /*Load all data from the tracked table*/
    require_once 'makedbconnection.php';
    $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM tracked ORDER BY software ASC;";
    $results = $connection->query($sql);

    /*Write the table*/
    $dom = new DOMDocument;
    $div = $dom->createElement("DIV");
    $div->setAttribute("CLASS", "container-fluid");
    $dom->appendChild($div);
    $table = $dom->createElement("TABLE");
    $table->setAttribute("CLASS", "table table-hover");
    $table->setAttribute("ID", "table-all-data");
    $div->appendChild($table);
    $headrow = $dom->createElement("TR");
    $thead = $dom->createElement("THEAD");
    $thead->appendChild($headrow);
    $table->appendChild($thead);
    
    /*Create the headings*/
    $thentry = $dom->createElement("TH", "Entry");
    $headrow->appendChild($thentry);
    $thvendor = $dom->createElement("TH", "Vendor");
    $headrow->appendChild($thvendor);
    $thinvoice = $dom->createELement("TH", "Invoice #");
    $headrow->appendChild($thinvoice);
    $thvoucher = $dom->createElement("TH", "Voucher #");
    $headrow->appendChild($thvoucher);
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
    
    /*Create the table body*/
    $tbody = $dom->createElement("TBODY");
    $table->appendChild($tbody);
    
    /*Create the data rows*/
    while ($row = $results->fetch_assoc()){   
        $datarow = $dom->createElement("TR");
        $tbody->appendChild($datarow);
        $entry = $dom->createElement("TD");
        $entrylink = $dom->createElement("A", "$row[software]");
        $entrylink->setAttribute("HREF", "entrypage.php?entry=$row[software]");
        $entry->appendChild($entrylink);
        $datarow->appendChild($entry);
        
        $vendor = $dom->createElement("TD");
        $vendorlink = $dom->createElement("A", "$row[vendor]");
        $vendorlink->setAttribute("HREF", "vendorpage.php?vendor=$row[vendor]");
        $vendor->appendChild($vendorlink);
        $datarow->appendChild($vendor);
        
        $invoice = $dom->createElement("TD", "$row[invoice]");
        $datarow->appendChild($invoice);
        
        $voucher = $dom->createElement("TD", "$row[voucher]");
        $datarow->appendChild($voucher);
        
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
        
        /*Set classes for upcoming renewals*/
        date_default_timezone_set("America/New_York");
        $now = new DateTime();
        $then = date_create_from_format("Y-m-d", "$row[renewal]");
        $interval = date_diff($now,$then);
        $days = $interval->days;
        if ($interval->invert === 0){
            if ($days < 60){
                $datarow->setAttribute("class", "critical");
            }
            elseif ($days > 60 && $days < 90){
                $datarow->setAttribute("class", "upcoming");
            }
        }
    }

echo  $dom->saveHTML();  
}
