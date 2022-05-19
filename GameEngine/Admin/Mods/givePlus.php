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

$plusdur = $_POST['plus'] * 86400;

$query = "SELECT * FROM ".TB_PREFIX."users";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	if($row['plus'] < time()) { $plusbefore = time(); $addplus = $plusbefore + $plusdur; } elseif($row['plus'] > time()) { $plusbefore = $row['plus']; $addplus = $plusbefore + $plusdur; }
	mysql_query("UPDATE ".TB_PREFIX."users SET
		plus = '".$addplus."' 
		WHERE id = '".$row['id']."'");
}

// header("Location: ../../../Admin/admin.php?p=givePlus&g");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=givePlus&g');
?>