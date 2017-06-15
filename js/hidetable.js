function hideTable(table){
    var targets = document.getElementsByClassName(table);
		for(var i=0; i< targets.length; i++) {
		targets[i].className = targets[i].className.replace( /(?:^|\s)show(?!\S)/g , ' hidden' );
            }
}