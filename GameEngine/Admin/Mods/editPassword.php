<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       editUser.php                                                ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateMultihunterSession.php");

$id = $_POST['uid'];
$pass = md5($_POST['newpw']);

mysql_query("UPDATE ".TB_PREFIX."users SET 
	password = '".$pass."'  
	WHERE id = $id") or die(mysql_error());

// header("Location: ../../../Admin/admin.php?p=player&uid=".$id."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$id);
?>