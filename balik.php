<?php
extract($_REQUEST);
$kata_satu = isset($kata1) ? $kata1 : '';
//$kata_satu = strtolower($kata_satu); //lowercase
$spaces = preg_match('/ /',$kata_satu);
	if( $spaces == 1 ){
		// lebih dari satu kata
		echo "Hanya boleh satu kata !";
		$kata_satu = "";
	}else{
		// hanya satu kata
	}
	include 'cek_database.php';
	if ($filter == false){//kosong
		$kata_dua = $kata_satu;
		if(!empty($_REQUEST)){
			$kata_dua = str_split($kata_dua); //pemecahan string to karakter
			$kata_dua = array_reverse($kata_dua); //pembalikan kalimat
			$kata_dua = implode('',$kata_dua); //penggabungan seluruh kalimat		
			$kata_dua = explode(" ",$kata_dua); //pengeluaran string per kata dalam kalimat
			$kata_dua = array_reverse($kata_dua); //pembalikan per kata dalam kalimat
			$kata_dua = implode(' ',$kata_dua); //penggabungan per kata dalam kalimat
		}
		}else{//adaisi
		$kata_dua = $filter;
	}	
?>
<form method="get" >
<table>
	<tr>
		<td>
			Kata Asal  
		</td>
		<td>			
			<?php echo '<input type="text" name="kata1" autofocus required placeholder="contoh" value="'.$kata_satu.'" size="27">'; ?> 
			<input type="submit" name="submit" value="Balik"/>
			<input name="reset" type="reset" value="Reset">
		</td>
	</tr>
	<tr>
		<td valign=top>
		Kata Balik
	    </td>
		<td>			
			<textarea rows="1" cols="35" readonly placeholder="hotnoc"><?php echo $kata_dua; ?></textarea>
		</td>
	</tr>
</table>
</form>