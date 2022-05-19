<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       delallymedal.php                                            ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateMultihunterSession.php"); 

$delete = $_POST['medalid'];
$aid = $_POST['aid'];

mysql_query("DELETE FROM ".TB_PREFIX."allimedal WHERE id = ".$delete."");

// header("Location: ../../../Admin/admin.php?p=alliance&aid=".$aid."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=alliance&aid='.$aid);
?>