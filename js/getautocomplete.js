function getAutocomplete(sourceid) {
    var target = document.getElementById(sourceid);
    var str = target.value;
    if (str !== "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var response = this.responseText;
                if (response.length > 1){
                    target.value = response;
                }
             }
        };
        xmlhttp.open("GET", "https://libstaff.bc.edu/softwaretracker/scripts/getautocomplete.php?str=" + str, true);
        xmlhttp.send();
    };
}