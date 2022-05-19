<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       mainteneceUnban.php                                         ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateAdminSession.php");

$reason = $_POST['unbanreason'];
$admin = $session;
$active = '0';
$access = '2';
$actualend = time();

mysql_query("UPDATE ".TB_PREFIX."banlist SET active = '".$active."', end = '".$actualend."' WHERE reason = '".$reason."'");

// header("Location: ../../../Admin/admin.php?p=ban");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=ban');
?>