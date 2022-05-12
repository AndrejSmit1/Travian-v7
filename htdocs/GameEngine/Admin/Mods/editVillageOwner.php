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

$id = $_POST['did'];

mysql_query("UPDATE ".TB_PREFIX."vdata SET 
	owner = '".$_POST['newowner']."' 
	WHERE wref = $id AND capital = 0") or die(mysql_error());

// header("Location: ../../../Admin/admin.php?p=player&uid=".$_POST['newowner']."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$_POST['newowner']);
?>