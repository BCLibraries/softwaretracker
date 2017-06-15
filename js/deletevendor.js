function deleteVendor(vendor){
    var check = confirm ("Delete this vendor?");
    var xmlhttp = new XMLHttpRequest();
    if (check === true){
        xmlhttp.open("GET", "/softwaretracker/scripts/deletevendor.php?vendor="+vendor, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
              alert("Vendor deleted");
              window.location.assign("/softwaretracker/");
        };
        
    }
}
}



