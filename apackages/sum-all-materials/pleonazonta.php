<?php 
$pleonazon = $size_quantity - $provlepomeno_value;
if($pleonazon > 0 && $size_quantity > 0) {
	echo $pleonazon;
	$pleonazon_sum = $pleonazon_sum + $pleonazon;
}
else { echo "0";}
?>