function downloadExpenseReport(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "/softwaretracker/scripts/makeexpensereport.php", true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                location.assign("/softwaretracker/downloads.php?report=full");
            }
        };
}
function downloadFundingSourceReport (source) {
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "/softwaretracker/scripts/makefundingsourcereport.php?q="+source, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function (){
            if (this.readyState === 4 && this.status === 200) {
                location.assign("/softwaretracker/downloads.php?report="+source);
            }
        };
}
function downloadUpcomingReport(days){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "/softwaretracker/scripts/makeupcomingreport.php?days="+days, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                location.assign("/softwaretracker/downloads.php?report=Upcoming&days="+days);
            }
        };
}