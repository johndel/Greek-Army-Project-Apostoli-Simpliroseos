<?php $provlepomeno_value = round($material_prov_power * $size_row['percentage']/100); ?>
<?php $sum_provlepomeno = $sum_provlepomeno + $provlepomeno_value; ?>

<?php 
if (($sum_provlepomeno + 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 1; }
elseif (($sum_provlepomeno - 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 1;  }
elseif (($sum_provlepomeno - 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 2;  }
elseif (($sum_provlepomeno + 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 2;  }
?>

<?php if($size_row['percentage'] != 0) { echo $provlepomeno_value; } else { echo "0"; } ?>
