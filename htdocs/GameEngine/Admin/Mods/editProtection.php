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

$id = $_POST['id'];

$dur = $_POST['protect'] * 86400;
$protection = (time() + $dur);

mysql_query("UPDATE ".TB_PREFIX."users SET 
	protect = '".$protection."' 
	WHERE id = $id") or die(mysql_error());

// header("Location: ../../../Admin/admin.php?p=player&uid=".$id."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$id);
?>