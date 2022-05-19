<?php
if($_GET){
	
	if (isset($_GET['f'])) {
		switch($_GET['f']) {
			case 'qst':
				if (isset($_GET['qact'])){
					$qact=$_GET['qact'];
				}else {
					$qact=null;
				}
				if (isset($_GET['qact2'])){
					$qact2=$_GET['qact2'];
				}else {
					$qact2=null;
				}
				if (isset($_GET['qact3'])){
					$qact3=$_GET['qact3'];
				}else {
					$qact3=null;
				}
				include("Templates/Ajax/quest_core.tpl");		
			break;
		}
	}
	if (isset($_GET['cmd'])) {
		switch($_GET['cmd']) {
			
			case 'changeVillageName':
				include_once ("GameEngine/Database.php");
		
				$q = "UPDATE " . TB_PREFIX . "vdata SET `name` = '" . $_POST['name'] . "' where `wref` = '" . $_POST['did'] . "'";
				mysql_query($q);
			break;
			
			case 'mapLowRes':
				$x = $_POST['x'];
				$y = $_POST['y'];
				$xx = $_POST['width'];
				$yy = $_POST['height'];
				
				include("Templates/Ajax/mapscroll.tpl");
			break;
		}
	}

}
?>
