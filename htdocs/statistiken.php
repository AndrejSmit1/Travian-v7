<?php

include("GameEngine/Village.php");
$start = $generator->pageLoadTimeStart();
if(isset($_GET['rank'])){ $_POST['rank']==$_GET['rank']; }
if(isset($_GET['newdid'])) {
	$_SESSION['wid'] = $_GET['newdid'];
	if(isset($_GET['tid'])) {
	header("Location: ".$_SERVER['PHP_SELF']."?tid=".$_GET['tid']);
	}else{
	header("Location: ".$_SERVER['PHP_SELF']);
	}
}
include "Templates/html.tpl";
?>
<body class="v35 webkit chrome statistics">
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
								<div id="content" class="statistics">
                                		<script type="text/javascript"> 
					window.addEvent('domready', function()
					{
						$$('.subNavi').each(function(element)
						{
							new Travian.Game.Menu(element);
						});
					});
				</script>

<h1 class="titleInHeader">Statistics<?php if($session->access == ADMIN) { echo " (<a href=\"medals.php\">Aggiorna Top 10</a>)"; } ?></h1>
<div class="contentNavi subNavi">
				<div title="" <?php if(!isset($_GET['tid']) || (isset($_GET['tid']) && ($_GET['tid'] == 1 || $_GET['tid'] == 31 || $_GET['tid'] == 32 || $_GET['tid'] == 7))) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php"><span class="tabItem">Players</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && ($_GET['tid'] == 4 || $_GET['tid'] == 41 || $_GET['tid'] == 42 || $_GET['tid'] == 43)) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="statistiken.php?tid=4"><span class="tabItem">Alliances</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 2) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="statistiken.php?tid=2"><span class="tabItem">Villages</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 8) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="statistiken.php?tid=8"><span class="tabItem">Heroes</span></a></div> 
				</div> 
				<div title="" <?php if(isset($_GET['tid']) && $_GET['tid'] == 0) { echo "class=\"container active\""; } else { echo "class=\"container normal\""; } ?>> 
					<div class="background-start">&nbsp;</div> 
					<div class="background-end">&nbsp;</div> 
					<div class="content"><a href="statistiken.php?tid=0"><span class="tabItem">General</span></a></div> 
				</div> 
				<?php if(WW == true){ include "Templates/Ranking/ww2.tpl"; }?>
				<div class="clear"></div>
</div>
<?php
if(isset($_GET['tid'])) {
	switch($_GET['tid']) {
		 case 31:
        include("Templates/Ranking/player_attack.tpl");
        break;
        case 32:
        include("Templates/Ranking/player_defend.tpl");
        break;
        case 7:
        include("Templates/Ranking/player_top10.tpl");
        break;
        case 2:
        include("Templates/Ranking/villages.tpl");
        break;
        case 4:
        include("Templates/Ranking/alliance.tpl");
        break;
        case 8:
        include("Templates/Ranking/heroes.tpl");
        break;
        case 11:
        include("Templates/Ranking/player_1.tpl");
        break;
        case 12:
        include("Templates/Ranking/player_2.tpl");
        break;
        case 13:
        include("Templates/Ranking/player_3.tpl");
        break;
        case 41:
        include("Templates/Ranking/alliance_attack.tpl");
        break;
        case 42:
        include("Templates/Ranking/alliance_defend.tpl");
        break;
        case 43:
        include("Templates/Ranking/ally_top10.tpl");
        break;
        case 0:
        include("Templates/Ranking/general.tpl");
        break;
        case 1:
        include("Templates/Ranking/overview.tpl");
        break;
        case 99:
        default:
        include("Templates/Ranking/ww.tpl");
        break;
	}
}
else {
	include("Templates/Ranking/overview.tpl");
}
?>

</div>
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


