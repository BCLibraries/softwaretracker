function deleteEntry(entry){
    var check = confirm ("Delete this entry?");
    var xmlhttp = new XMLHttpRequest();
    if (check === true){
        xmlhttp.open("GET", "scripts/deleteentry.php?entry="+entry, true);
        xmlhttp.send();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
              alert("Entry deleted");
              window.location.assign("./");
        };
        
    };
}
}

