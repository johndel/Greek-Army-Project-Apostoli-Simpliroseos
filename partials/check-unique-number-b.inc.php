<?php
	include("../partials/database-connect-old-nice-way.inc.php");
	$query = "SELECT id, 'a' as `package_category` FROM a_packages WHERE a_packages.number=".$_POST['d']." UNION SELECT `id`, 'b' as `package_category` FROM b_packages WHERE b_packages.number=".$_POST['d'];  
	$result_tmp = mysql_query($query);
	$result = mysql_fetch_row($result_tmp);
	if($result > 0) {
		echo $result[0]."@".$result[1];
	}
?>