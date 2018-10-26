<?php
session_start();
//connect to DB
require('../php-connect.php');
$db = get_db();





if(isset($_POST['displayName']))
{
$displayName = htmlspecialchars($_POST['displayName']);
$username = htmlspecialchars($_POST['username']);
$pass = htmlspecialchars($_POST['pass']);

$newPass = password_hash($pass, PASSWORD_DEFAULT);

$query = $db->prepare("INSERT INTO public.user(username, password, display_name)
VALUES (:username, :password, :displayName)");
$query->bindValue(":username", $username, PDO::PARAM_STR);
$query->bindValue(":displayName", $displayName, PDO::PARAM_STR);
$query->bindValue(":password", $newPass, PDO::PARAM_STR);

    try
    {
        $query->execute();
    }
    catch(PDOException $Exception)
    {
        $msg = "Username already exists";
        header("location: create-user.php?msg=$msg");
    }

$userInfo = $query->fetch(PDO::FETCH_ASSOC);

$idQuery = $db->prepare("SELECT id FROM public.user
                        WHERE username = :username");
$idQuery->bindValue(":username", $username, PDO::PARAM_STR);
$idQuery->execute();
$userId = $idQuery->fetch(PDO::FETCH_ASSOC);


$_SESSION['id'] = $userId['id'];
$_SESSION['username'] = $username;
}
header('location: browse.php');

?>
