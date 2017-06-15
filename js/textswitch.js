function textSwitch(targetclass){
	var target = document.getElementsByClassName(targetclass);
        var onbuttons = document.getElementsByClassName(targetclass+'on');
	if (target[0].className === targetclass+" hidden") {
		for(var i=0; i< target.length; i++) {
		target[i].className = target[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' show' );
                }
		for(var i=0; i< onbuttons.length; i++) {
		onbuttons[i].className = onbuttons[i].className.replace( /(?:^|\s)show(?!\S)/g , ' hidden' );
                }
	} else {
		for(var i=0; i< target.length; i++) {
		target[i].className = target[i].className.replace( /(?:^|\s)show(?!\S)/g , ' hidden' );
                }
		for(var i=0; i< onbuttons.length; i++) {
		onbuttons[i].className = onbuttons[i].className.replace( /(?:^|\s)hidden(?!\S)/g , ' show' );
                }
}
}

