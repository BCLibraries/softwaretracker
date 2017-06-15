function optionUsernames(data) {
    var namearray = [];
    var targets = document.getElementsByClassName("selectusername");
    for (i=2;i < data.feed.entry.length;i++){
        if (data.feed.entry[i].gs$cell.col === "2"){
            var name = data.feed.entry[i].gs$cell.$t + ", " + data.feed.entry[i-1].gs$cell.$t;
            namearray.push(name);
        }
    }
    for (j=0;j < targets.length;j++){
        for (i=0;i < namearray.length;i++){
            var option = document.createElement("OPTION");
            option.value = namearray[i];
            var text = document.createTextNode(namearray[i]);
            option.appendChild(text);
            targets[j].appendChild(option);
        }
    }    
}

