    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Database Boso Walikan</title>
<link rel ="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="batas">
		<header>
			<div id="kepala-kiri">
				<h1 style="font-size:30px;font-weight:bold;">Kamus Walikan Database Arema</h1>        
			</div>   
			<div class="clear"></div>    
			<nav> 
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="kamus.php">Kamus</a></li>
					<li><a href="database.php">Database</a></li>
					<li><a href="tentang.php">Tentang</a></li>
					<li><a href="admin.php">Admin</a></li>
				</ul>
			</nav>
			<div class="clear"></div> 
		</header>
		<div id="badan">   
			<p><b>Di bawah ini merupakan form untuk menambahkan kosa kata dari nawak-nawak yang ingin mengkustomisasikan boso walikan sesuai
			penggunaan dalam kesehariannya. Setalah itu data akan di proses oleh admin untuk di seleksi apakah sesuai atau tidak. Nawak-nawak 
			dapat menggunakan pedoman pada <a href="kamus.php">kamus</a> yang sudah ada untuk di masukkan ke database sistem.</b></p>
  <form action="" method="post">
        Kata Asal  <input name="asal" type="text" autofocus required/></br>
        Kata Balik  <input name="balik" type="text" required /></br>
        <input type="submit" name="submit" value="Simpan">	
			<?php
				$txt = "data/data.txt"; 					
					@$spaces = preg_match('/ /',$_POST['asal']);
					@$spaces2 = preg_match('/ /',$_POST['balik']);
					if( ($spaces == 1  && $spaces2 == 1) || ($spaces == 1  || $spaces2 == 1) ){
						// lebih dari satu kata
						echo "Hanya boleh satu kata !";
						$_POST['asal'] = "";
						$_POST['balik'] = "";						
						}else{
					 if (isset($_POST['asal']) && isset($_POST['balik'])) { // cek jika sudah diset
						$fh = fopen($txt, 'a'); 
						$txt='"'.$_POST['balik'].'" = "'.$_POST['asal'].'";'. "\n"; 
						fwrite($fh,$txt); // Tulis data
						fclose($fh); // Tutup file
						echo "</br>Terima kasih, atas partisipasinya nawak-nawak Arema!";
					}
					
				}
			?>
  </div>
			<div class="clear"></div>    
			<footer>
				Tugas Besar PEMWEB B 2014, Januar Anas. 
			</footer>
		</div>
</body>
</html>