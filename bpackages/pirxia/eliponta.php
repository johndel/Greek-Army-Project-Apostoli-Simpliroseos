<?php 
if($size_row['percentage'] == 0) { $provlepomeno_value = 0; }
$elipon = $sizes[$a_a-1] - $size_quantity;
if($elipon > 0) {
	$elipon_sum = $elipon_sum + $elipon;
	echo $elipon;
}
else { echo "0";}
?>