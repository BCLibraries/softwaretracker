function checkPassword(formname){
    var password = document.getElementById(formname+'-pass1').value;
    var confirm = document.getElementById(formname+'-pass2').value;
    if (confirm === password) {
    document.getElementsByName(formname)[0].submit();
    }
    else {
        var warning = "Passwords do not match";
        document.getElementById(formname+'-error').innerHTML = warning;
    }
}

