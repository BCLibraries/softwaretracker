
function moreLicenses(){
    var target, licenseinput, platform, options;
    target = document.getElementById("addlicenses");
    licenseinput = document.createElement("INPUT");
    licenseinput.setAttribute('placeholder','License Key');
    licenseinput.setAttribute('name', 'licensekey[]');
    platform = document.createElement("SELECT");
    platform.setAttribute("name", "platform[]");
    options = ['PC', 'Mac', 'Both'];
    options.forEach(function(element){
        var htmloption = document.createElement("OPTION");
        htmloption.setAttribute("value", element);
        var text = document.createTextNode(element);
        htmloption.appendChild(text);
        platform.appendChild(htmloption);
    });
    target.appendChild(licenseinput);
    target.appendChild(platform);
}

