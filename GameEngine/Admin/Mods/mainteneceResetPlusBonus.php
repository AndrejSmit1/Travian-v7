<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       mainteneceBan.php                                           ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("validateAdminSession.php");

mysql_query("UPDATE ".TB_PREFIX."users SET b1 = '0', b2 = '0', b3='0', b4='0' WHERE id !=0");

// header("Location: ../../../Admin/admin.php?p=maintenenceResetPlusBonus&g");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=maintenenceResetPlusBonus&g');
?>