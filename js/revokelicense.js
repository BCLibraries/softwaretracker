function revokeLicense(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            location.reload();
            }
         };
    xmlhttp.open("GET", "https://libstaff.bc.edu/softwaretracker/scripts/revokelicense.php?jsid=" + id, true);
    xmlhttp.send();
};

