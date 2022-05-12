<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	if(isset($_GET['x']) && isset($_GET['y'])) {
	header("Location: ".$_SERVER['PHP_SELF']."?x=".$_GET['x']."&y=".$_GET['y']);
	}else{
	$havecoor = 1;
	$coor = $database->getCoor($_SESSION['wid']);
	header("Location: ".$_SERVER['PHP_SELF']."?x=".$coor['x']."&y=".$coor['y']);
	}
}
else {
	$building->procBuild($_GET);
}
	if(!isset($_GET['x']) && !isset($_GET['y']) && !$havecoor) {
	header("Location: ".$_SERVER['PHP_SELF']."?x=".$village->coor['x']."&y=".$village->coor['y']);
	}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome map">
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
<?php
if(isset($_GET['x']) && isset($_GET['y'])) {
	if($database->getVilWref($_GET['x'],$_GET['y'])) {
		include("Templates/Map/vilview.tpl");
	}
	else {
		include("Templates/Map/mapview.tpl");
	}
}


?>   
<div class="clear">&nbsp;</div>

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
