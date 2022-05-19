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

$duration = $_POST['duration'] * 3600;
$start = $_POST['start'];
$startts = strtotime($start);
$endts = $startts + $duration;
$reason = $_POST['reason'];
$admin = $session;
$active = '1';
$access = '2';

$query = "SELECT * FROM ".TB_PREFIX."users WHERE access = ".$access."";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	##mysql_query("INSERT INTO ".TB_PREFIX."banlist ".$row['id'].", ".$row['username'].", ".$reason.", ".$startts.", ".$endts.", ".$admin.", ".$active."");
	mysql_query("INSERT INTO ".TB_PREFIX."banlist (`uid`, `name`, `reason`, `time`, `end`, `admin`, `active`) VALUES (".$row['id'].", '".$row['username']."' , '$reason', '$startts', '$endts', '$admin', '$active')");
}

// header("Location: ../../../Admin/admin.php?p=ban");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=ban');
?>