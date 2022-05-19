<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	header("Location: ".$_SERVER['PHP_SELF']);
}
else {
	$message->noticeType($_GET);
	$message->procNotice($_POST);
}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome reports">
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
<a id="ingameManual" href="help.php"><img class="question" alt="Help" src="img/x.gif"></a>
												<div class="clear"></div> 


<div id="contentOuterContainer">
<div class="contentTitle">&nbsp;</div>
<div class="contentContainer">
<div id="content" class="reports">
<h1 class="titleInHeader">Reports</h1>
<div class="contentNavi subNavi">
				<div title="" class="container <?php if (!isset($_GET['t'])) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php"><span class="tabItem">All</span></a></div>
				</div>
				<div title="" class="container <?php if (isset($_GET['t']) && $_GET['t'] == 1) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php?t=1"><span class="tabItem">Attack</span></a></div>
				</div>
				<div title="" class="container <?php if (isset($_GET['t']) && $_GET['t'] == 5) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php?t=5"><span class="tabItem">Reinforcement</span></a></div>
				</div>
				<div title="" class="container <?php if (isset($_GET['t']) && $_GET['t'] == 3) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php?t=3"><span class="tabItem">Miscellaneous</span></a></div>
				</div>
				<div title="" class="container <?php if (isset($_GET['t']) && $_GET['t'] == 2) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php?t=2"><span class="tabItem">Trade</span></a></div>

				</div>
                <?php if($session->plus) { ?>
				<div title="" class="container <?php if (isset($_GET['t']) && $_GET['t'] == 4) { echo "active"; }else{ echo "normal"; } ?>">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="berichte.php?t=4"><span class="tabItem">Archive</span></a></div>
				</div> <?php } ?>
<div class="clear"></div>
</div>
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

if(isset($_GET['n1']) && isset($_GET['del'])==1) {
	$database->delNotice($_GET['n1'], $session->uid);
	header("Location: berichte.php");
}
if(isset($_GET['aid'])){
	if($session->alliance==$_GET['aid']){
		
		if(isset($_GET['id'])) {
			$type = $database->getNotice2($_GET['id'], 'ntype');
			include("Templates/Notice/".$type.".tpl");
		}
	}
}else{
	
	if(isset($_GET['t'])) {
		include("Templates/Notice/t_".$_GET['t'].".tpl");
	}
	elseif(isset($_GET['id'])) {
		if($database->getNotice2($_GET['id'], 'uid') == $session->uid){
		$type = ($message->readingNotice['ntype'] == 5)? $message->readingNotice['archive'] : $message->readingNotice['ntype'];
		include("Templates/Notice/".$type.".tpl");
		}
	} else {
		include("Templates/Notice/all.tpl");
	}	
}
?>


<div class="clear">&nbsp;</div>
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
