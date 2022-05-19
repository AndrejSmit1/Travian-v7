<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       renameVillage.php                                           ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateMultihunterSession.php"); 

$did = $_POST['did'];
$name = mysql_real_escape_string($_POST['villagename']);

$sql = "UPDATE ".TB_PREFIX."vdata SET name = '$name' WHERE wref = $did";
mysql_query($sql);

// header("Location: ../../../Admin/admin.php?p=village&did=".$did."&name=".$name."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=village&did='.$did.'&name='.$name);
?>