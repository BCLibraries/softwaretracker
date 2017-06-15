function displayUser(inputid){
 var grouprequest = new XMLHttpRequest();
 var rolerequest = new XMLHttpRequest();
 var username = document.getElementById(inputid).value;
        grouprequest.open("GET", "/softwaretracker/scripts/loadusergroups.php?jsuser="+username, true);
        grouprequest.send();
        grouprequest.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
               document.getElementById('usergroup').innerHTML = this.responseText;
            }
        };
        rolerequest.open("GET","/softwaretracker/scripts/loaduserroles.php?jsuser="+username, true);
        rolerequest.send();
        rolerequest.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
               document.getElementById('userrole').innerHTML = this.responseText;
            }
        };
}

