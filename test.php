
<!DOCTYPE html>
<html>
<head>
	<title>Map Viewer</title>
	<link href='https://portal.labstats.com/Content/MapViewer.css' rel='stylesheet'>
</head>
<body>
	<div id='mapTarget'></div>

	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	<script src='https://cdn.jsdelivr.net/excanvas/r3/excanvas.compiled.js'></script>
	<script src='https://portal.labstats.com/Scripts/MapViewer.js'></script>
	<script>
		$('#mapTarget').LabMap({
			mapId: 1001,
			authId: 'ef8e9eb7-a11c-4034-b205-bf1d778191a4',
			domain: 'https://portal.labstats.com'
		});
	</script>
</body>
</html>