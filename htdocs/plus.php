<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['ok'])){
	$database->updateUserField($session->username,'ok','0','0'); $_SESSION['ok'] = '0'; }
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	if(isset($_GET['id'])) {
	header("Location: ".$_SERVER['PHP_SELF']."?id=".$_GET['id']);
	}else{
	header("Location: ".$_SERVER['PHP_SELF']);
	}
}
else {
	$building->procBuild($_GET);
}
$automation->isWinner();
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome plus">
	<div id="wrapper"> 
		<img id="staticElements" src="img/x.gif" alt="" /> 
		<div id="logoutContainer"> 
			<a id="logout" href="logout.php" title="<?php echo LOGOUT; ?>">&nbsp;</a> 
		</div> 
		<div class="bodyWrapper"> 
			<img style="filter:chroma();" src="img/x.gif" id="msfilter" alt="" /> 
			<div id="header"> 
				<div id="mtop">
					<a id="logo" href="<?php echo HOMEPAGE; ?>" target="_blank" title="<?php echo SERVER_NAME ?>"></a>
					<?php
						include("Templates/navigation.tpl");
					?>
<div class="clear"></div> 
</div> 
</div>
					<div id="mid"> 
 
												<div class="clear"></div> 
						<div id="contentOuterContainer"> 
							<div class="contentTitle">&nbsp;</div> 
							<div class="contentContainer"> 
						<div id="content" class="plus">
                        <script type="text/javascript">
					window.addEvent('domready', function()
					{
						$$('.subNavi').each(function(element)
						{
							new Travian.Game.Menu(element);
						});
					});
				</script>
<?php
if(isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id = "";
}

if ($id == "") {
	include("Templates/Plus/1.tpl");
}else{
	if($id<=6){
	if (isset($_GET['mail']) && $id == 5){
		include("Templates/Plus/invite.tpl");
	}else{
		include("Templates/Plus/".$id.".tpl");
	}
	}else{
		$golds = $database->getUserArray($session->username, 0);
		if($id == 7){
			if($session->gold >= 2) {
				$MyVilId = mysql_query("SELECT * FROM ".TB_PREFIX."bdata WHERE `wid` = '".$village->wid."'");
				$uuVilid = mysql_fetch_array($MyVilId);
				$MyVilId2 = mysql_query("SELECT * FROM ".TB_PREFIX."research WHERE `vref` = '".$village->wid."'");
				$uuVilid2 = mysql_fetch_array($MyVilId2);
				if (mysql_num_rows($MyVilId) || mysql_num_rows($MyVilId2)) {
					mysql_query("UPDATE ".TB_PREFIX."bdata set timestamp = '1' where wid = ".$village->wid." AND type != '25' OR type != '26'");
					mysql_query("UPDATE ".TB_PREFIX."research set timestamp = '1' where vref = '".$village->wid."'");
					mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 2 where `username` = '".$session->username."'");
					header("Location: plus.php?id=3&g");
				}
			}
		}elseif($id == 8){
			if($session->gold >= 10) {
				if($golds['plus'] == 0) {
					mysql_query("UPDATE ".TB_PREFIX."users set plus = ".time()."+".PLUS_TIME." where `username`='".$session->username."'");
				} else {
					mysql_query("UPDATE ".TB_PREFIX."users set plus = plus + ".PLUS_TIME." where `username`='".$session->username."'");
				}
				mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 10 where `username` = '".$session->username."'");
			}
		}elseif($id == 9){
			if($session->gold >= 5) {
				if($golds['b1'] == 0) {
					mysql_query("UPDATE ".TB_PREFIX."users set b1 = ".time()."+".PLUS_PRODUCTION." where `username`='".$session->username."'");
				} else {
					mysql_query("UPDATE ".TB_PREFIX."users set b1 = b1 + ".PLUS_PRODUCTION." where `username`='".$session->username."'");
				}
				mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 5 where `username` = '".$session->username."'");
			}
		}elseif($id == 10){
			if($session->gold >= 5) {
				if($golds['b2'] == 0) {
					mysql_query("UPDATE ".TB_PREFIX."users set b2 = ".time()."+".PLUS_PRODUCTION." where `username`='".$session->username."'");
				} else {
					mysql_query("UPDATE ".TB_PREFIX."users set b2 = b2 + ".PLUS_PRODUCTION." where `username`='".$session->username."'");
				}
				mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 5 where `username` = '".$session->username."'");
			}
		}elseif($id == 11){
			if($session->gold >= 5) {
				if($golds['b3'] == 0) {
					mysql_query("UPDATE ".TB_PREFIX."users set b3 = ".time()."+".PLUS_PRODUCTION." where `username`='".$session->username."'");
				} else {
					mysql_query("UPDATE ".TB_PREFIX."users set b3 = b3 + ".PLUS_PRODUCTION." where `username`='".$session->username."'");
				}
				mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 5 where `username` = '".$session->username."'");
			}
		}elseif($id == 12){
			if($session->gold >= 5) {
				if($golds['b4'] == 0) {
					mysql_query("UPDATE ".TB_PREFIX."users set b4 = ".time()."+".PLUS_PRODUCTION." where `username`='".$session->username."'");
				} else {
					mysql_query("UPDATE ".TB_PREFIX."users set b4 = b4 + ".PLUS_PRODUCTION." where `username`='".$session->username."'");
				}
				mysql_query("UPDATE ".TB_PREFIX."users set gold = gold - 5 where `username` = '".$session->username."'");
			}
		}elseif($id == 13){
			
		}elseif($id == 14){
			
		}elseif($id == 15){
			if($session->gold >= 100) {
				mysql_query("UPDATE ".TB_PREFIX."users set goldclub = 1, gold = gold - 100 where `username`='".$session->username."'");
			}
		}
		header("Location: plus.php?id=3");
	}
}
?>
</div>
<div class="clear"></div>
</div>
<div class="contentFooter">&nbsp;</div>
					</div>
                    
<?php
include("Templates/sideinfo.tpl");
include("Templates/footer.tpl");
include("Templates/header.tpl");
include("Templates/res.tpl");
include("Templates/vname.tpl");
include("Templates/quest.tpl");
?>
	</div>
<div id="ce"></div>
</div>
</body>
</html>

