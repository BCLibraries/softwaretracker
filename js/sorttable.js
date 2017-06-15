var alltables = document.getElementsByTagName("TABLE");
for (var i=0;i < alltables.length;i++) {
    var th = alltables[i].getElementsByTagName("TH");
    for (var j=0;j < th.length;j++){
        th[j].onclick = sortTable;
        th[j].setAttribute("column",j);
        var defaultimage = document.createElement("img");
        defaultimage.src = "/softwaretracker/images/null.png";
        th[j].appendChild(defaultimage);
    }
}

function sortTable() {
  var table, headrow, rows, heading, image, column, switching, i, x, y,k,l, shouldSwitch;
  column = this.getAttribute("column");
  headrow = this.parentNode;
  table = headrow.parentNode;
  heading = table.getElementsByTagName("TH");
  
  if (this.getAttribute("stage") === "down"){
    for (i=0; i < heading.length; i++) {
      image = heading[i].getElementsByTagName("img")[0];
      image.src = '/softwaretracker/images/null.png';
      heading[i].setAttribute("stage", 'null');
  }
    this.getElementsByTagName("img")[0].src = "/softwaretracker/images/uparrow.png"; 
    switching = true; 
    while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length-1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[column];
      y = rows[i + 1].getElementsByTagName("TD")[column];
      k = parseFloat(x.innerHTML);
      l = parseFloat(y.innerHTML);

      if (k !== k){
          if(x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
      }
      else{
        if (k < l) {
        shouldSwitch= true;
        break;
      }
      }
    }
 
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i+1], rows[i]);
      switching = true; 
    }
  }
}
  
else {
  for (i=0; i < heading.length; i++) {
      image = heading[i].getElementsByTagName("img")[0];
      image.src = '/softwaretracker/images/null.png';
      heading[i].setAttribute("stage", 'null');
  }
  this.getElementsByTagName("img")[0].src = "/softwaretracker/images/downarrow.png"; 
  this.setAttribute("stage", "down");
  switching = true;
    
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[column];
      y = rows[i + 1].getElementsByTagName("TD")[column];
      k = parseFloat(x.innerHTML);
      l = parseFloat(y.innerHTML);

      if (k !== k){
          if(x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
      }
      else{
        if (k > l) {
        shouldSwitch= true;
        break;
      }
      }
      
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
  }
}


