<?php
//////////////// made by TTMTT ////////////////
if($session->access!=BANNED){
$topic_id = $_GET['pod'];
$post_id = $_GET['pod'];
$topics = $database->ShowTopic($topic_id);
$posts = $database->ShowPostEdit($post_id);
foreach($topics as $top) {
	$title = stripslashes($top['title']);
}
foreach($posts as $pos) {
	$poss = stripslashes($pos['post']);
	$poss = preg_replace('/\[message\]/', '', $poss);
	$poss = preg_replace('/\[\/message\]/', '', $poss);
	$alliance0 = $pos['alliance0'];
	$player0 = $pos['player0'];
	$coor0 = $pos['coor0'];
	$report0 = $pos['report0'];
}
?>
<form method="post" name="post" action="allianz.php?s=2&pid=<?php echo $_GET['pid']; ?>&tid=<?php echo $_GET['idt']; ?>">
	<input type="hidden" name="s" value="2">
	<input type="hidden" name="pod" value="<?php echo $_GET['pod']; ?>">
	<input type="hidden" name="alliance0" value="<?php echo $alliance0; ?>">
	<input type="hidden" name="player0" value="<?php echo $player0; ?>">
	<input type="hidden" name="coor0" value="<?php echo $coor0; ?>">
	<input type="hidden" name="report0" value="<?php echo $report0; ?>">
	<input type="hidden" name="editpost" value="1">
    <h4 class="round">Edit answer</h4>
    
    
    <table class="transparent" id="new_post">
	<tbody>
	<tr>
		<th>Thread:</th>
		<td><?php echo $title; ?></td>
	</tr>
	<tr>
	<td colspan="2">
		
			<div id="text_container" class="bbEditor">
				<div class="boxes boxesColor gray"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div><div class="boxes-contents">
				<div id="text_toolbar" class="bbToolbar"><button type="button" value="bbBold" class="icon bbButton bbBold bbType{d} bbTag{b}"><img src="img/x.gif" class="bbBold" alt="bbBold"></button><button type="button" value="bbItalic" class="icon bbButton bbItalic bbType{d} bbTag{i}"><img src="img/x.gif" class="bbItalic" alt="bbItalic"></button><button type="button" value="bbUnderscore" class="icon bbButton bbUnderscore bbType{d} bbTag{u}"><img src="img/x.gif" class="bbUnderscore" alt="bbUnderscore"></button><button type="button" value="bbAlliance" class="icon bbButton bbAlliance bbType{d} bbTag{alliance0}"><img src="img/x.gif" class="bbAlliance" alt="bbAlliance"></button><button type="button" value="bbPlayer" class="icon bbButton bbPlayer bbType{d} bbTag{player0}"><img src="img/x.gif" class="bbPlayer" alt="bbPlayer"></button><button type="button" value="bbCoordinate" class="icon bbButton bbCoordinate bbType{d} bbTag{coor0}"><img src="img/x.gif" class="bbCoordinate" alt="bbCoordinate"></button><button type="button" value="bbReport" class="icon bbButton bbReport bbType{d} bbTag{report0}"><img src="img/x.gif" class="bbReport" alt="bbReport"></button><button type="button" value="bbResource" id="text_resourceButton" class="bbWin{resources} bbButton bbResource icon"><img src="img/x.gif" class="bbResource" alt="bbResource"></button><button type="button" value="bbSmilies" id="text_smilieButton" class="bbWin{smilies} bbButton bbSmilies icon"><img src="img/x.gif" class="bbSmilies" alt="bbSmilies"></button><button type="button" value="bbTroops" id="text_troopButton" class="bbWin{troops} bbButton bbTroops icon"><img src="img/x.gif" class="bbTroops" alt="bbTroops"></button><button type="button" value="bbPreview" id="text_previewButton" class="icon bbButton bbPreview"><img src="img/x.gif" class="bbPreview" alt="bbPreview"></button><div class="clear"></div>
					<div id="text_toolbarWindows" class="bbToolbarWindow">
						<div id="text_resources"><a href="#" class="bbType{o} bbTag{l}"><img src="img/x.gif" class="r1" alt="???"></a><a href="#" class="bbType{o} bbTag{cl}"><img src="img/x.gif" class="r2" alt="???"></a><a href="#" class="bbType{o} bbTag{c}"><img src="img/x.gif" class="r4" alt="????"></a><a href="#" class="bbType{o} bbTag{i}"><img src="img/x.gif" class="r3" alt="???"></a></div>
						<div id="text_smilies"><a href="#" class="bbType{s} bbTag{*aha*}"><img class="smiley aha" src="img/x.gif" alt="*aha*"></a><a href="#" class="bbType{s} bbTag{*angry*}"><img class="smiley angry" src="img/x.gif" alt="*angry*"></a><a href="#" class="bbType{s} bbTag{*cool*}"><img class="smiley cool" src="img/x.gif" alt="*cool*"></a><a href="#" class="bbType{s} bbTag{*cry*}"><img class="smiley cry" src="img/x.gif" alt="*cry*"></a><a href="#" class="bbType{s} bbTag{*cute*}"><img class="smiley cute" src="img/x.gif" alt="*cute*"></a><a href="#" class="bbType{s} bbTag{*depressed*}"><img class="smiley depressed" src="img/x.gif" alt="*depressed*"></a><a href="#" class="bbType{s} bbTag{*eek*}"><img class="smiley eek" src="img/x.gif" alt="*eek*"></a><a href="#" class="bbType{s} bbTag{*ehem*}"><img class="smiley ehem" src="img/x.gif" alt="*ehem*"></a><a href="#" class="bbType{s} bbTag{*emotional*}"><img class="smiley emotional" src="img/x.gif" alt="*emotional*"></a><a href="#" class="bbType{s} bbTag{:D}"><img class="smiley grin" src="img/x.gif" alt=":D"></a><a href="#" class="bbType{s} bbTag{:)}"><img class="smiley happy" src="img/x.gif" alt=":)"></a><a href="#" class="bbType{s} bbTag{*hit*}"><img class="smiley hit" src="img/x.gif" alt="*hit*"></a><a href="#" class="bbType{s} bbTag{*hmm*}"><img class="smiley hmm" src="img/x.gif" alt="*hmm*"></a><a href="#" class="bbType{s} bbTag{*hmpf*}"><img class="smiley hmpf" src="img/x.gif" alt="*hmpf*"></a><a href="#" class="bbType{s} bbTag{*hrhr*}"><img class="smiley hrhr" src="img/x.gif" alt="*hrhr*"></a><a href="#" class="bbType{s} bbTag{*huh*}"><img class="smiley huh" src="img/x.gif" alt="*huh*"></a><a href="#" class="bbType{s} bbTag{*lazy*}"><img class="smiley lazy" src="img/x.gif" alt="*lazy*"></a><a href="#" class="bbType{s} bbTag{*love*}"><img class="smiley love" src="img/x.gif" alt="*love*"></a><a href="#" class="bbType{s} bbTag{*nocomment*}"><img class="smiley nocomment" src="img/x.gif" alt="*nocomment*"></a><a href="#" class="bbType{s} bbTag{*noemotion*}"><img class="smiley noemotion" src="img/x.gif" alt="*noemotion*"></a><a href="#" class="bbType{s} bbTag{*notamused*}"><img class="smiley notamused" src="img/x.gif" alt="*notamused*"></a><a href="#" class="bbType{s} bbTag{*pout*}"><img class="smiley pout" src="img/x.gif" alt="*pout*"></a><a href="#" class="bbType{s} bbTag{*redface*}"><img class="smiley redface" src="img/x.gif" alt="*redface*"></a><a href="#" class="bbType{s} bbTag{*rolleyes*}"><img class="smiley rolleyes" src="img/x.gif" alt="*rolleyes*"></a><a href="#" class="bbType{s} bbTag{:(}"><img class="smiley sad" src="img/x.gif" alt=":("></a><a href="#" class="bbType{s} bbTag{*shy*}"><img class="smiley shy" src="img/x.gif" alt="*shy*"></a><a href="#" class="bbType{s} bbTag{*smile*}"><img class="smiley smile" src="img/x.gif" alt="*smile*"></a><a href="#" class="bbType{s} bbTag{*tongue*}"><img class="smiley tongue" src="img/x.gif" alt="*tongue*"></a><a href="#" class="bbType{s} bbTag{*veryangry*}"><img class="smiley veryangry" src="img/x.gif" alt="*veryangry*"></a><a href="#" class="bbType{s} bbTag{*veryhappy*}"><img class="smiley veryhappy" src="img/x.gif" alt="*veryhappy*"></a><a href="#" class="bbType{s} bbTag{;)}"><img class="smiley wink" src="img/x.gif" alt=";)"></a></div>
						<div id="text_troops"><a href="#" class="bbType{o} bbTag{tid1}"><img class="unit u1" src="img/x.gif" alt="????? ?????"></a><a href="#" class="bbType{o} bbTag{tid2}"><img class="unit u2" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid3}"><img class="unit u3" src="img/x.gif" alt="???????"></a><a href="#" class="bbType{o} bbTag{tid4}"><img class="unit u4" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid5}"><img class="unit u5" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid6}"><img class="unit u6" src="img/x.gif" alt="?????? ????"></a><a href="#" class="bbType{o} bbTag{tid7}"><img class="unit u7" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid8}"><img class="unit u8" src="img/x.gif" alt="?????? ?????"></a><a href="#" class="bbType{o} bbTag{tid9}"><img class="unit u9" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid10}"><img class="unit u10" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid11}"><img class="unit u11" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid12}"><img class="unit u12" src="img/x.gif" alt="???? ???"></a><a href="#" class="bbType{o} bbTag{tid13}"><img class="unit u13" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid14}"><img class="unit u14" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid15}"><img class="unit u15" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid16}"><img class="unit u16" src="img/x.gif" alt="?????? ????"></a><a href="#" class="bbType{o} bbTag{tid17}"><img class="unit u17" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid18}"><img class="unit u18" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid19}"><img class="unit u19" src="img/x.gif" alt="????"></a><a href="#" class="bbType{o} bbTag{tid20}"><img class="unit u20" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid21}"><img class="unit u21" src="img/x.gif" alt="????? ?????"></a><a href="#" class="bbType{o} bbTag{tid22}"><img class="unit u22" src="img/x.gif" alt="???????"></a><a href="#" class="bbType{o} bbTag{tid23}"><img class="unit u23" src="img/x.gif" alt="?? ???"></a><a href="#" class="bbType{o} bbTag{tid24}"><img class="unit u24" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid25}"><img class="unit u25" src="img/x.gif" alt="???? ?????"></a><a href="#" class="bbType{o} bbTag{tid26}"><img class="unit u26" src="img/x.gif" alt="?????? ???"></a><a href="#" class="bbType{o} bbTag{tid27}"><img class="unit u27" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid28}"><img class="unit u28" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid29}"><img class="unit u29" src="img/x.gif" alt="???? ?????"></a><a href="#" class="bbType{o} bbTag{tid30}"><img class="unit u30" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid31}"><img class="unit u31" src="img/x.gif" alt="??? ??????"></a><a href="#" class="bbType{o} bbTag{tid32}"><img class="unit u32" src="img/x.gif" alt="??????"></a><a href="#" class="bbType{o} bbTag{tid33}"><img class="unit u33" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid34}"><img class="unit u34" src="img/x.gif" alt="????"></a><a href="#" class="bbType{o} bbTag{tid35}"><img class="unit u35" src="img/x.gif" alt="????"></a><a href="#" class="bbType{o} bbTag{tid36}"><img class="unit u36" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid37}"><img class="unit u37" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid38}"><img class="unit u38" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{tid39}"><img class="unit u39" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid40}"><img class="unit u40" src="img/x.gif" alt="???"></a><a href="#" class="bbType{o} bbTag{tid41}"><img class="unit u41" src="img/x.gif" alt="???? ??? ?????"></a><a href="#" class="bbType{o} bbTag{tid42}"><img class="unit u42" src="img/x.gif" alt="??? ???"></a><a href="#" class="bbType{o} bbTag{tid43}"><img class="unit u43" src="img/x.gif" alt="????? ?????"></a><a href="#" class="bbType{o} bbTag{tid44}"><img class="unit u44" src="img/x.gif" alt="??????? ?????"></a><a href="#" class="bbType{o} bbTag{tid45}"><img class="unit u45" src="img/x.gif" alt="???? ??"></a><a href="#" class="bbType{o} bbTag{tid46}"><img class="unit u46" src="img/x.gif" alt="?????? ?????"></a><a href="#" class="bbType{o} bbTag{tid47}"><img class="unit u47" src="img/x.gif" alt="??? ???? ????? ????"></a><a href="#" class="bbType{o} bbTag{tid48}"><img class="unit u48" src="img/x.gif" alt="?????? ????"></a><a href="#" class="bbType{o} bbTag{tid49}"><img class="unit u49" src="img/x.gif" alt="????????? ?????"></a><a href="#" class="bbType{o} bbTag{tid50}"><img class="unit u50" src="img/x.gif" alt="?????"></a><a href="#" class="bbType{o} bbTag{??????}"><img class="unit uhero" src="img/x.gif" alt="??????"></a></div>
					</div>
				</div>
					</div>
				</div>
				<textarea id="text" name="text"><?php echo $poss; ?></textarea>
				<div id="text_preview" name="text_preview"></div>
			</div>

			<script type="text/javascript">
				window.addEvent('domready', function()
				{
					new Travian.Game.BBEditor("text");
				});
			</script>
			
	</td></tr>
	</tbody></table><div class="spacer"></div><button type="submit" value="ok" name="s1" id="fbtn_ok"><div class="button-container"><div class="button-position"><div class="btl"><div class="btr"><div class="btc"></div></div></div><div class="bml"><div class="bmr"><div class="bmc"></div></div></div><div class="bbl"><div class="bbr"><div class="bbc"></div></div></div></div><div class="button-contents">OK</div></div></button></form></p>
<span style="color: #DD0000"><b>Warning:</b> you can't use the values <b>[message]</b> or <b>[/message]</b> in your post because it can cause problem with bbcode system.</span>
	<?php }else{
header("Location: banned.php");
}
?>