
function moreLicenses(){
    var target, licenseinput, platform, options, div;
    target = document.getElementById("addlicenses");
    licenseinput = document.createElement("INPUT");
    licenseinput.setAttribute("CLASS", "form-control");
    licenseinput.setAttribute("TYPE", "text");
    licenseinput.setAttribute('placeholder','License Key');
    licenseinput.setAttribute('name', 'licensekey[]');
    
    platform = document.createElement("SELECT");
    platform.setAttribute("CLASS", "form-control");
    platform.setAttribute("name", "platform[]");
    options = ['Select Platform', 'PC', 'Mac', 'Both'];
    options.forEach(function(element){
        var htmloption = document.createElement("OPTION");
        htmloption.setAttribute("value", element);
        var text = document.createTextNode(element);
        htmloption.appendChild(text);
        platform.appendChild(htmloption);
    });
    
    div = document.createElement("DIV");
    div.setAttribute("CLASS", "form-group");    
    div.appendChild(licenseinput);
    div.appendChild(platform);
    
    target.appendChild(div);
}

