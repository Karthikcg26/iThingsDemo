<?php
session_start();
include("smartComm.php");
include("authenticate.php");
if (!isset ($_SESSION['sessionId']))
{
    if (empty($_POST["username"]))
    {
        header("Location: login.html");
    }
    else
    {
        $user = new userlogin;
        $sessionid = $user->logintenant($_POST["username"], $_POST["password"],$_POST["tenant"]);
        $tenant= $_POST["tenant"];
        if (!empty($sessionid) && $sessionid != "Error")
        {
            // Set session variables
            $_SESSION['sessionId'] = $sessionid; //setting session-id
            $_SESSION['tenant'] = $tenant;		//setting tenant
            header("Location: " . $_POST["redirectURL"]);
        }
        else
        {
            echo "The redirectURL is " . $_POST["redirectURL"];
            header("Location: login.php?message=Wrong User or password");
        }
    }
}
?>