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

mysql_query("UPDATE ".TB_PREFIX."users SET plus = '0' WHERE id !=0");

// header("Location: ../../../Admin/admin.php?p=maintenenceResetPlus&g");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=maintenenceResetPlus&g');
?>