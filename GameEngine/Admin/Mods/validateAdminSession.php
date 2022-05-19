<?php
session_start();
include_once("../../Database.php"); 

$session = $_POST['admid'];
$sessionaccess = 0;

// validate against ID stored in current user session to avoid spoofing of requests
if (is_numeric($session) && $_SESSION['id'] == $session)
{
    $sql = mysql_query("SELECT access FROM ".TB_PREFIX."users WHERE id = ".$session."");
    $access = mysql_fetch_array($sql);
    $sessionaccess = $access['access'];
}

if ($sessionaccess != ADMIN) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

?>