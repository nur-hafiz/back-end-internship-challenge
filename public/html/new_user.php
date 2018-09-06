<?php 
require_once "../../autoload.php";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $user   = new User;
    $user_DB = new UserDB;
    $last_name  = $_REQUEST['last_name'];
    $first_name = $_REQUEST['first_name'];
    $user->fillEntity([$last_name,$first_name]);
    $user_DB->newEntry($user);
}

?>

<!DOCTYPE html>
<html>
<head></head>

<body>

<form name='newUser' method='POST'>
first name:
<input type='text' name='first_name'><br>

last name:
<input type='text' name='last_name'><br>

<input type='submit' value='submit'>
</form>

</body>

</html>