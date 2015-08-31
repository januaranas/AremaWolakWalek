<?php session_start();
//cek login atau belum
	if(!isset($_SESSION['login_user'])){
		header('Location:login.php?pagename='.basename($_SERVER['PHP_SELF'], ".php"));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Dashboard</title>
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
	<?php
	echo 'Halon Admin dashboard. (<a href="login.php?ch=logout">Logout</a>)';
	?>
	<?php
		$fn = "data/database.txt";
		if (isset($_POST['content'])){
			$content = stripslashes($_POST['content']);
			$fp = fopen($fn,"w") or die ("Error opening file in write mode!");
			fputs($fp,$content);
			fclose($fp) or die ("Error closing file!");
		}
	?>
	<?php
		$fx = "data/data.txt";
		if (isset($_POST['isi'])){
			$isi = stripslashes($_POST['isi']);
			$fy = fopen($fx,"w") or die ("Error opening file in write mode!");
			fputs($fy,$isi);
			fclose($fy) or die ("Error closing file!");
		}
	?>
	
	<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
		<table >
			<tr>
				<td>Inputan dari user (data/data.txt) :</td>	
				<td>Isi File Database (data/database.txt) :</td>
			</tr>
			<tr>
				<td><textarea rows="20" cols="30" name="isi"><?php readfile($fx); ?></textarea></td>	
				<td><textarea rows="20" cols="30" name="content"><?php readfile($fn); ?></textarea></td>
			</tr>
			<tr><td><input type="submit" value="Update"><input type="reset" value="Reset"> </td>
			</tr>
		</table>
	</form>
</div>
	<div class="clear"></div>    
	<footer>
		Tugas Besar PEMWEB B 2014, Januar Anas. 
	</footer>
</div>
</body>
</html>

