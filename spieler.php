<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
$profile->procProfile($_POST);
$profile->procSpecial($_GET);
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	if(isset($_GET['s'])){
	header("Location: ".$_SERVER['PHP_SELF']."?s=".preg_replace("/[^a-zA-Z0-9_-]/","",$_GET['s']));
	}else if(isset($_GET['uid'])){
	header("Location: ".$_SERVER['PHP_SELF']."?uid=".preg_replace("/[^a-zA-Z0-9_-]/","",$_GET['uid']));
	}else{
	header("Location: ".$_SERVER['PHP_SELF']);
}
}
if(!isset($_GET['s']) && !isset($_GET['uid'])){
	header("Location: ".$_SERVER['PHP_SELF']."?uid=".preg_replace("/[^a-zA-Z0-9_-]/","",$session->uid));
}
if(isset($_GET['s'])){
$automation->isWinner();
}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome spieler">
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
<div id="content" class="player">
<?php $username = $database->getUserField($_GET['uid'],"username",0); ?>
<h1 class="titleInHeader">Player profile <?php if(isset($_GET['uid']) && is_numeric($_GET['uid'])){ echo "- ".$username; } ?></h1>
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
if($_GET['uid'] == $session->uid || isset($_GET['s'])) {
include("Templates/Profile/menu.tpl");
}
if(isset($_GET['uid'])) {
	if($_GET['uid'] >= 2) {
		$user = $database->getUserArray($_GET['uid'],1);
		if(isset($user['id'])){
			include("Templates/Profile/overview.tpl");
		} else {
			include("Templates/Profile/notfound.tpl");
		}
	} else {
		include("Templates/Profile/special.tpl");
	}
}
else if (isset($_GET['s'])) {
	if($_GET['s'] == 1) {
		include("Templates/Profile/profile.tpl");
	}
	if($_GET['s'] == 2) {
		include("Templates/Profile/preference.tpl");
	}
	if($_GET['s'] == 3) {
		include("Templates/Profile/account.tpl");
	}
	if($_GET['s'] == 4) {
		include("Templates/Profile/graphic.tpl");
	}
	if($_GET['s'] > 4 or $session->is_sitter == 1) {
	header("Location: ".$_SERVER['PHP_SELF']."?uid=".preg_replace("/[^a-zA-Z0-9_-]/","",$session->uid));
	}
}
if (isset($_GET['id'])==$session->uid && isset($_GET['type'])==3) {
	$owner = $_GET['owner'];
	$id = $_GET['id'];
	$database->removeMeSit($owner, $id);
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


