<?php
#################################################################################
##                                                                             ##
##              -= YOU MUST NOT REMOVE OR CHANGE THIS NOTICE =-                ##
##                                                                             ##
## --------------------------------------------------------------------------- ##
##                                                                             ##
##  Project:       ZravianX                                                    ##
##  Version:       2011.11.05                                                  ##
##  Filename:      GameEngine/Admin/Mods/editUser.php                          ##
##  Developed by:  Dzoki                                                       ##
##  Edited by:     ZZJHONS                                                     ##
##  License:       Creative Commons BY-NC-SA 3.0                               ##
##  Copyright:     ZravianX (c) 2011 - All rights reserved                     ##
##  URLs:          http://zravianx.zzjhons.com                                 ##
##  Source code:   http://www.github.com/ZZJHONS/ZravianX                      ##
##                                                                             ##
#################################################################################

include_once("validateMultihunterSession.php");

$id = $_POST['id'];
$user = $database->getUserArray($id,1);
mysql_query("UPDATE ".TB_PREFIX."users SET email = '".$_POST['email']."', tribe = ".$_POST['tribe'].", location = '".$_POST['location']."', desc1 = '".$_POST['desc1']."', `desc2` = '".$_POST['desc2']."' WHERE id = ".$_POST['id']."");
mysql_query("Insert into ".TB_PREFIX."admin_log values (0,".$_SESSION['id'].",'Changed <a href=\'admin.php?p=village&did=$id\'>".$user['username']."</a>\'s profile',".time().")");

//header("Location: ../../../admin.php?p=player&uid=".$id."");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=player&uid='.$id);
?>