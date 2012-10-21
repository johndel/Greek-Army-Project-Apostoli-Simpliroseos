<?php if(isset($tmp)) { $tmp++; } else { $tmp = 0; } ?>
<tr data-material="<?php echo $i; ?>">
<td class="count_aa"><?php echo $tmp + 1; ?></td>
<td>      <select name="a_materials[]" class="b_materials" > 
          <?php  
          $getMats = 'SELECT * FROM a_materials 
                      ORDER BY name ASC'; 
          $materials = $conn->query($getMats); 
          while ($row = $materials->fetch_assoc()) { 
          ?> 
          <option value="<?php echo $material_id = $row['id']; ?>" <?php 
          if ($material_id == $mate_id) { 
            echo 'selected=selected'; 
          } ?>><?php echo $row['name']; ?></option> 
          <?php } ?> 
          </select>
</td>
<td>
		  <span class='no-size-text'>-</span>
		  <select style="margin: 0 auto" name="sizes[]" class="b_sizes"> 
          <?php  
          $getSizes = 'SELECT * FROM a_sizes ORDER BY id ASC'; 
          $Sizes = $conn->query($getSizes); 
          while ($row = $Sizes->fetch_assoc()) { 
          ?> 
          <option value="<?php echo $row['id']; ?>" data-materialsize="<?php echo $row['material_id'] ?>" <?php 
	// if($material_id == $row['material_id']) { echo 'class = "appear"'; } else { echo 'class = "disappear"'; }          
	if (isset($_POST['a_materials']) && in_array($row['id'],
            $_POST['a_materials'])) { 
            echo 'selected'; 
          } ?>><?php echo $row['size']; ?></option> 
          <?php } ?> 
          </select>
		  
		<div class="disabled-options"> 
				  <?php  
				  $getSizes = 'SELECT * FROM a_sizes ORDER BY id ASC'; 
				  $sizes_result = $conn->query($getSizes); 
				  while ($row = $sizes_result->fetch_assoc()) { ?> 
					<option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $size) { echo 'selected=selected'; } ?> data-materialsize="<?php echo $row['material_id'] ?>"><?php echo $row['size']; ?></option> 
				  <?php } ?>
		</div>
</td>
<td>
	  <input name="quantity[]" autocomplete="off" type="text" size="3" value="<?php echo $quantity; ?>" class="bmaterial_number"></input>
</td>
<td>
	<a href="javascript:;" class="remove-material-row btn btn-danger" ><i class="icon-minus"></i> Αφαίρεση Υλικού</a>
</td>
</tr>
	  <input type="hidden" class="edit_mode" />


