<tr> 
	<?php
	for($i=0; $i<count(ibu_mertua) ; $i++) {
	
	?>
		<td> 
			nama ibu 
			<select>
				<option value="<?php echo "$data['nama_mertua']" ?> "> <?php echo "$data['nama_mertua']" ?> </option>
			</select>
			
		
		</td>
		
		<td>
			<?php echo "$data['alamat_mertua']" ?> ">
		</td>
		
		<td>
			<?php echo "$data['umur_mertua']" ?> ">
		</td>
		
		<td>
			<?php echo "$data['keterangan_mertua']" ?> ">
		</td>
		
	<?php 
	 }
	?>
</tr>