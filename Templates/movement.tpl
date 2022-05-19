<?php

$moveSendAttack = $database->getMovement2(3,$village->wid,0);
$countSendAttack = count($moveSendAttack);
$moveIncommingAttack = $database->getMovement2(3,$village->wid,1);
$countIncommingAttack = count($moveIncommingAttack);

$moveSendReinforcement = $database->getMovement2(7,$village->wid,0);
$countSendReinforcement = count($moveSendReinforcement);
$moveIncommingReinforcement = $database->getMovement2(34,$village->wid,1);
$countIncommingReinforcement = count($moveIncommingReinforcement);

$moveNewVillage = $database->getMovement2(5,$village->wid,0);
$countNewVillage = count($moveNewVillage);
$moveAdventure = $database->getMovement2(9,$village->wid,0);
$countAdventure = count($moveAdventure);

$aantal= $countSendAttack + $countIncommingAttack + $countSendReinforcement + $countIncommingReinforcement + $countNewVillage + $countAdventure;

if($aantal > 0) { $class = ''; } else { $class = 'hide'; }
?>
<div class="movements <?php echo $class ?>"><div class="boxes villageList movements"><div class="boxes-tl"></div><div class="boxes-tr"></div><div class="boxes-tc"></div><div class="boxes-ml"></div><div class="boxes-mr"></div><div class="boxes-mc"></div><div class="boxes-bl"></div><div class="boxes-br"></div><div class="boxes-bc"></div>
    <div class="boxes-contents">
    <table id="movements" cellpadding="1" cellspacing="1"><thead><tr><th colspan="3"><?php echo TROOP_MOVEMENTS; ?></th></tr></thead><tbody>

<?php

/* attack/raid on you! */
$aantal = $countIncommingAttack;
$aantal2 = $moveIncommingAttack;
for($i=0;$i<$aantal;$i++){
	if($aantal2[$i]['attack_type'] == 2)
		$aantal -= 1;
	}
	if($aantal > 0){
			foreach($aantal2 as $receive) {
				$action = 'att1';
				$aclass = 'a1';
				$title = ARRIVING_ATTACKING_TROOPS;
				$short = ATTACK;
			}
			
		echo '
		<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$aantal.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
$timer += 1;

}

?>
<?php
/* Units send to reinf. (to my town) */
$aantal = $countIncommingReinforcement;
$aantal2 = $moveIncommingReinforcement;

	if($aantal > 0){
			foreach($aantal2 as $receive) {
				$action = 'def1';
				$aclass = 'd1';
				$title = ARRIVING_REINF_TROOPS;
				$short = ARRIVING_REINF_TROOPS_SHORT;
			}
			
		echo '<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$aantal.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
	$timer += 1;

	}

/* Units send to reinf. (from my town) */
$aantal = $countSendReinforcement;
$aantal2 = $moveSendReinforcement;

for($i=0;$i<$aantal;$i++){
	if(($aantal2[$i]['attack_type']==1) or ($aantal2[$i]['attack_type']==9)){
		$aantal -= 1;}
}
	if($aantal > 0){
			foreach($aantal2 as $receive) {				
				$action = 'def2';
				$aclass = 'd2';
				$title = OWN_REINFORCING_TROOPS;
				$short = ARRIVING_REINF_TROOPS_SHORT;
				}
			
		echo '
		<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$lala.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
$timer += 1;

}

?>
<?php
/* on attack, raid */
$aantal = $countSendAttack;
$aantal2 = $moveSendAttack;
for($i=0;$i<$aantal;$i++){
	if($aantal2[$i]['attack_type'] == 2)
		$aantal -= 1;
}
	if($aantal > 0){
			foreach($aantal2 as $receive) {
				$action = 'att2';
				$aclass = 'a2';
				$title = OWN_ATTACKING_TROOPS;
				$short = ATTACK;
			}
			
		echo '
		<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$aantal.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
$timer += 1;

}

?>

<?php
$aantal = $countNewVillage;
$aantal2 = $moveNewVillage;
	if($aantal > 0){
			foreach($aantal2 as $receive) {
				$action = 'att3';
				$aclass = 'a3';
				$title = FOUND_NEW_VILLAGE;
				$short = FOUND_NEW_VILLAGE_SHORT;
			}
			
		echo '
		<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$aantal.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
$timer += 1;

}

$aantal = $countAdventure;
$aantal2 = $moveAdventure;
	if($aantal > 0){
			foreach($aantal2 as $receive) {
				$action = 'att4';
				$aclass = 'a4';
				$title = 'Adventure';
				$short = 'Adventure';
			}
			
		echo '
		<tr>
			<td class="typ"><a href="build.php?id=39"><img src="img/x.gif" class="'.$action.'" alt="'.$title.'" title="'.$title.'" /></a><span class="'.$aclass.'">&raquo;</span></td>
			<td><div class="mov"><span class="'.$aclass.'">'.$aantal.'&nbsp;'.$short.'</span></div><div class="dur_r">&nbsp;<span id="timer'.$timer.'">'.$generator->getTimeFormat($receive['endtime']-time()).'</span>&nbsp;'.HOURS.'</div></div></td>
		</tr>';
		
$timer += 1;

}
?>


</tbody></table>
        </div></div></div>
