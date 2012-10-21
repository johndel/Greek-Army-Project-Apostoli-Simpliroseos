<?php 
if($size_row['percentage'] == 0) { $provlepomeno_value = 0; }
$elipon = $provlepomeno_value - $size_quantity;
if($elipon > 0) {
	$elipon_sum = $elipon_sum + $elipon;
	echo $elipon;
}
else { echo "0";}
?>