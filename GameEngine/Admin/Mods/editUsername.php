<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       deletemedalsbyuser.php                                      ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateMultihunterSession.php");

$uid = $_POST['uid'];
$session = $_POST['admid'];

mysql_query("UPDATE ".TB_PREFIX."users SET username = '".$_POST['username']."' WHERE id = ".$uid."");

// header("Location: ../../../Admin/admin.php?p=player&uid=".$uid."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$uid);
?>