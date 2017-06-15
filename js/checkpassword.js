function checkPassword(formid){
    var password = document.getElementById(formid+'-pass1').value;
    var confirm = document.getElementById(formid+'-pass2').value;
    if (confirm === password) {
    document.getElementsByClassName(formid)[0].submit();
    }
    else {
        var warning = "Passwords do not match";
        document.getElementById(formid+'-error').innerHTML = warning;
    }
}

