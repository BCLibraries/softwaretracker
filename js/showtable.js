function showTable(){
    var table = document.getElementById("table_source").value;
    var targets = document.getElementsByClassName(table);
		for(var i=0; i< targets.length; i++) {
		targets[i].className = targets[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' show' );
            }
}
