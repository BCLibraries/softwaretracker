<?PHP 
session_start();
/*Check to see if already logged in*/
if(!isset($_SESSION["username"])){
    /*Are they trying to login?*/
    if(isset($_REQUEST['username'])){
        require_once 'lib/password.php';
        require_once 'scripts/makedbconnection.php';
        $connection = makeDBConnection(DB_HOST, DB_ADMIN, DB_ADMIN_PASSWORD, DB_NAME);
        $username = filter_var($_REQUEST['username']);
        $password = filter_var($_REQUEST['password']);

        $sql = "select role, password from users where username='$username';";
        $result = $connection->query($sql);
        $validate = $result->fetch_assoc();
        /*Success*/
        if (password_verify($password, $validate["password"])){
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $validate["role"];
            header('Location: ./homepage.php');
            exit();
        }
        /*Failed to login. Sets the warning then loads the rest of the page*/
        else {
            $errormessage = "Invalid Credentials";
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/mainstyle.css" type="text/css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container">
            
            <div class="row">
            <div class="col-lg-3"></div>
            <div class='col-lg-6'>
                <?PHP echo (isset($errormessage)? "<h1 id='error'>$errormessage</h1>" : ""); ?>
            <?PHP echo (isset($_GET["logout"]) ? "<h1>You have been logged out</h1>" : ""); ?>
            <form action='<?PHP echo $_SERVER['PHP_SELF']; ?>' method='post'>
                <h2>Software Tracker</h2>
                <div class='form-group'>
                <input class="form-control" type="text" name="username" placeholder='Username' value="<?PHP echo (isset($_REQUEST["username"]) ? $_REQUEST["username"] : "");?>" required>
                <input class="form-control" type='password' name='password' placeholder='Password'>
                </div>
                <button class="btn btn-default" type='submit'>Log In</button> 
            </form>
            </div>
            <div class="col-lg-3"></div>
            </div>
        </div>
            
    </body>
</html>
<?PHP 
/*If they were logged in*/
}
else {
    header('Location: ./homepage.php');
    exit();
}
?>