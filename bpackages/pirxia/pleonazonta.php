<?php 
$pleonazon = $size_quantity - $sizes[$a_a-1];
if($pleonazon > 0 && $size_quantity > 0) {
	echo $pleonazon;
	$pleonazon_sum = $pleonazon_sum + $pleonazon;
}
else { echo "0";}
?>