<?php include("../partials/database-connect-old-nice-way.inc.php"); ?>









<?php if(isset($tmp)) { $tmp++; } else { $tmp = 0; } ?>
<tr>
<td class="count_aa"><?php echo $tmp + 1; ?></td>
<td>      <select name="oplismou_materials[]" class="oplismou_materials" > 
          <?php  
          $getMats = 'SELECT * FROM oplismou_materials ORDER BY yliko ASC'; 
          $materials = mysql_query($getMats) or die(mysql_error()); 
          while ($row = mysql_fetch_assoc($materials)) { 
          ?> 
          <option value="<?php echo $material_id = $row['id']; ?>" <?php 
          if (isset($material_row) && ($material_row['material_id'] == $row['id'])) { 
            echo 'selected'; 
          } ?>><?php echo $row['yliko']; ?></option> 
          <?php } ?> 
          </select>
</td>

<td>
	<input name="quantity[]" autocomplete="off" type="text" size="3" value="<?php if(isset($material_row)) { echo $material_row['quantity']; } ?>" class="bmaterial_number"></input>
</td>

<td>
	<input name="gun_number[]" autocomplete="off" type="text" size="3" value="<?php if(isset($material_row)) { echo $material_row['gun_number']; } ?>" class="bmaterial_number"></input>

</td>

<td>
	<textarea name="comments[]" cols="10" rows="1" size="3" class="bmaterial_number"><?php if(isset($material_row)) { echo $material_row['comments']; } ?></textarea>
</td>


<td>
	<a href="javascript:;" class="remove-material-row btn btn-danger"><i class="icon-minus"></i> Αφαίρεση Υλικού</a>
</td>
</tr>



