<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       populateOases.php                                           ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

ini_set('max_execution_time', 300);

include_once("validateAdminSession.php"); 

$database->populateOasisdata();  
$database->populateOasis();
$database->populateOasisUnitsLow();

// this function was not defined and I do not know what the idea was, thus we use the other one (high -> low)
// $database->populateOasisUnitsHigh();

// header("Location: ../../../Admin/admin.php?p=server_info");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=server_info');
?>