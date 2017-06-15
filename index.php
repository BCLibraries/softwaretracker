<!DOCTYPE html>
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
            header('Location: https://libstaff.bc.edu/softwaretracker/homepage.php');
            exit();
        }
        /*Failed to login. Sets the warning then loads the rest of the page*/
        else {
            $errormessage = "Invalid Credentials";
        }
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/login.css"
    </head>
    <body>
        <div class="content-area">
            <?PHP echo (isset($errormessage)? "<h1 id='error'>$errormessage</h1>" : ""); ?>
            <?PHP echo (isset($_GET["logout"]) ? "<h1>You have been logged out</h1>" : ""); ?>
            <form action='<?PHP echo $_SERVER['PHP_SELF']; ?>' method='post'>

                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder='Username' value="<?PHP echo (isset($_REQUEST["username"]) ? $_REQUEST["username"] : "");?>" required>
                    <label for='password'>Password:</label>
                    <input type='password' name='password' placeholder='Password'>
                    <input type='submit' value='Log In'>
            </form>                    
                </fieldset>
            </form>
        </div>
    </body>
</html>
<?PHP 
/*If they were logged in*/
}
else {
    header('Location: /softwaretracker/homepage.php');
    exit();
}
?>