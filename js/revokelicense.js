function revokeLicense(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //I used this instead of reload to prevent it from resubmitting POST data.
            var here = window.location.href;
            location.assign(here);
            }
         };
    xmlhttp.open("GET", "https://libstaff.bc.edu/softwaretracker/scripts/revokelicense.php?jsid=" + id, true);
    xmlhttp.send();
};

