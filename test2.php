<!DOCTYPE html>
<html>
    <head>
        <title>Public Page Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </head>
    <body>
        <h1 id="setlabel"></h1>
        <table class="table" id="masterTable">
                <tr>
                    <th>Group Name</th>
                    <th>Group Usage</th>
                    <th>In Use</th>
                    <th>Powered On</th>
                    <th>Total</th>
                    <th>Description</th>
                </tr>
        </table>
    </body>
</html>

<style>
</style>

<script>
    var customerId = 'ef8e9eb7-a11c-4034-b205-bf1d778191a4';
    var serverAddr = 'https://portal.labstats.com';
    var publicPageSetId = 1001;
    var refreshIntervalMilliseconds = 30000; // Sets the refresh interval in milliseconds.  We recommend not going below 30 seconds (30000 milliseconds).

    $(document).ready(function () {
        $.support.cors = true;
        getTableInformation();

        setInterval(function() {
            getTableInformation();
        }, refreshIntervalMilliseconds);
    });

    function getTableInformation(){
        $.support.cors = true;

        $.ajax({
            type:'GET',
            headers: { 'Authorization': customerId },
            url: serverAddr + '/api/public/GetPublicApiData/' + publicPageSetId
        }).done(function (res) {
            $('#setlabel').html(res.Name);

            $("#masterTable td").remove();

            for(var i=0; i<res.Groups.length; i++){
                var group = res.Groups[i];

                var currentUtilization = (group.InUse / group.Total) * 100;

                $('<tr>').append(
                    $('<td>').text(group.Label),
                    $('<td><progress value="' + currentUtilization + '" max="100">'),
                    $('<td>').text(group.InUse),
                    $('<td>').text(group.Available),
                    $('<td>').text(group.Total),
                    $('<td>').text(group.Description)
                ).appendTo('#masterTable');
            }
        });
    };
</script>