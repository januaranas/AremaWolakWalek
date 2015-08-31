<?php
session_start();
	if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'login'){ 
		if($_REQUEST['uname'] == 'admin' && $_REQUEST['pass'] == 'admin')
			$_SESSION['login_user'] = 1;
		else{
			$_SESSION['login_msg'] = 1;
		}
	}
	if(isset($_REQUEST['pagename']))
	$pagename = $_REQUEST['pagename']; 
	if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'logout'){
		unset($_SESSION['login_user']);
		header('Location:login.php');
	}
	if(isset($_SESSION['login_user'])){
		if(isset($_REQUEST['pagename']))
			header('Location:'.$pagename.'.php');
		else
			header('Location:admin.php');
	}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin Login</title>
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
	<table width="850" border="0"  cellpadding="0" cellspacing="0">
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				<form name="login_form" method="post" action="">
					<table style="background-color:#fff;">
					<tr><td colspan="2" ><strong>Login Details</strong></td></tr>
					<tr><td>Username</td><td><input type="text" name="uname" id="uname"></td></tr>
					<tr><td>Password</td><td><input type="password" name="pass" id="pass"></td></tr>
					<tr><td colspan="2" ><p style="color:red;">
			<?php
				if(isset($_SESSION['login_msg'])){
					echo 'Username dan Passrword Salah!';
					unset($_SESSION['login_msg']);
				}
			?>
			</p>
			</td>
		</tr>
		<tr><td colspan="2"><input type="submit" value="Login"></td></tr>
	</table>
	<input type="hidden" name="ch" value="login">
			</form>
			</td>
		</tr>
	</table>
<?php } ?>
		</div>
		<div class="clear"></div>    
		<footer>
			Tugas Besar PEMWEB B 2014, Januar Anas. 
		</footer>
	</div>
</body>
</html>