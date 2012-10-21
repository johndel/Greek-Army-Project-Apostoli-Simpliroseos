<?php $provlepomeno_value = round($material_prov_power * $size_row['percentage']/100); ?>
<?php //$test = "test: ".$sum_provlepomeno." + ".$provlepomeno_value." = ".($sum_provlepomeno + $provlepomeno_value); ?>

<?php //$test = "test: ".$sum_provlepomeno." --- ".$provlepomeno_value." "; ?>

<?php $sum_provlepomeno = $sum_provlepomeno + $provlepomeno_value; ?>


<?php
if($material_prov_power < 20) {
	if(($tmp_size_count == $count_sizes)) {
		if (($sum_provlepomeno + 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 1; }
		elseif (($sum_provlepomeno - 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 1;  }
		elseif (($sum_provlepomeno - 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 2;  }
		elseif (($sum_provlepomeno + 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 2;  }
	}
} else {
		if (($sum_provlepomeno + 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 1; }
		elseif (($sum_provlepomeno - 1) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 1;  }
		elseif (($sum_provlepomeno - 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value - 2;  }
		elseif (($sum_provlepomeno + 2) == $material_prov_power) { $provlepomeno_value = $provlepomeno_value + 2;  }
}
?>

<?php //$test = "test: ".$sum_provlepomeno." + ".$provlepomeno_value." = ".($sum_provlepomeno + $provlepomeno_value); ?>
<?php //$test = $test.$provlepomeno_value; ?>

<?php if($size_row['percentage'] != 0) { echo $provlepomeno_value; } else { echo "0"; } //$provlepomeno_value ?>
