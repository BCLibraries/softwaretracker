<?PHP require_once 'scripts/authorize.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add Licenses to Software</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <?PHP require_once 'scripts/navbar.php';?>
        <script src='js/morelicenses.js'></script>
    </head>
    <body>
        <?PHP navbar();?>
        <div class="container">
        <?PHP require_once 'scripts/softwarebar.php';?>
        <h1>Add Licenses to <?PHP echo FILTER_INPUT(INPUT_GET, "entry", FILTER_SANITIZE_STRING);?></h1>
        <form id="addlicenses" action='confirm.php' method="POST">
            <input class="form-control" type='hidden' name='software' value='<?PHP echo FILTER_INPUT(INPUT_GET, "entry", FILTER_SANITIZE_STRING);?>'>
            <input class="form-control" type='text' name='licensekey[]' placeholder="License Key">
            <select class="form-control" name='platform[]'>
                <option>Select Platform</option>
                <option value='PC'>PC</option>
                <option value='Mac'>Mac</option>
                <option value='Both'>Both</option>
            </select><br>
        </form>
        <div class="form-group">
            <button class="btn btn-default" onclick='moreLicenses()'>Add More Spaces</button>
        </div>
        <div class="form-group">
            <button class="btn btn-default" form="addlicenses" name="addlicense" type='submit'>Submit</button>
        </div>
        </div>
    </body>
</html>
