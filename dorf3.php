<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['ok'])){
	$database->updateUserField($session->username,'ok','0','0'); $_SESSION['ok'] = '0'; }
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	if(isset($_GET['s'])){
	header("Location: ".$_SERVER['PHP_SELF']."?s=".$_GET['s']);
	}else{
	header("Location: ".$_SERVER['PHP_SELF']);
}
}
else {
	$building->procBuild($_GET);
}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome village3">
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
						<div id="content" class="village3">
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
if($session->plus){
  if(isset($_GET['s'])){
    if($_GET['s'] == 2){
      include("Templates/dorf3/2.tpl");   
    }elseif($_GET['s'] == 3){
      include("Templates/dorf3/3.tpl");   
    }elseif($_GET['s'] == 4){
      include("Templates/dorf3/4.tpl");   
    }elseif($_GET['s'] == 5){
      include("Templates/dorf3/5.tpl");   
    }
  }else{
    include("Templates/dorf3/1.tpl");     
  } 
}else{
  include("Templates/dorf3/noplus.tpl"); 
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

