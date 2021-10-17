<?php
function metersToFeetInches($meters, $echo = true)
{
	$m = $meters;
	$valInFeet = $m*3.2808399;
	$valFeet = (int)$valInFeet;
	$valInches = round(($valInFeet-$valFeet)*12);
	$data = $valFeet."&prime;".$valInches."&Prime;";
	if($echo == true)
	{
		echo $data;
	} else {
		return $data;
	}
}
?>