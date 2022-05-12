<?php
#################################################################################
##                                                                             ##
##              -= YOU MUST NOT REMOVE OR CHANGE THIS NOTICE =-                ##
##                                                                             ##
## --------------------------------------------------------------------------- ##
##                                                                             ##
##  Project:       ZravianX                                                    ##
##  Version:       2011.12.03                                                  ##
##  Filename:      GameEngine/Admin/Mods/gold.php                              ##
##  Developed by:  Dzoki                                                       ##
##  Edited by:     ZZJHONS                                                     ##
##  License:       Creative Commons BY-NC-SA 3.0                               ##
##  Copyright:     ZravianX (c) 2011 - All rights reserved                     ##
##  URLs:          http://zravianx.zzjhons.com                                 ##
##  Source code:   http://www.github.com/ZZJHONS/ZravianX                      ##
##                                                                             ##
#################################################################################

include_once("validateAdminSession.php"); 

$id = $_POST['id'];
$gold = $_POST['gold'];
$q = "UPDATE ".TB_PREFIX."users SET gold = gold + ".$_POST['gold']." WHERE id != '0'";
mysql_query($q);
mysql_query("Insert into ".TB_PREFIX."admin_log values (0,$id,'Added <b>$gold</b> gold to all users',".time().")");

// header("Location: ../../../Admin/admin.php?p=gold&g=$gold");

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);

header('Location: '.$data['path'].'?p=gold&g='.$gold);
?>