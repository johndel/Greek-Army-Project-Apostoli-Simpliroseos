<style>
.print-grid {
border: 1px solid red;
}

.print-grid td {
border: 1px solid green;
width: 32px;
height: 32px;
}

</style>
<table class="print-grid" >
<?php for($i=1;$i<29;$i++) { ?>
<tr>
	<td><?php echo $i; ?></td>
	<?php for($j=2;$j<20;$j++) { ?>
	<td><?php if($i == 1 && $j != 1) {echo $j;} ?>&nbsp;</td>
	<?php } ?>
</tr>
<?php } ?>
</table>