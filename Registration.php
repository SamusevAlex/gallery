<?php
session_start();
if (!preg_match("/^\w+$/", $_POST["login"]) and $_POST["login"] != '') {
    $error = 'Not valid name';
} else {
	if (preg_match("/^\w+$/", $_POST["login"])) {
		if ($_POST["password"] == '') {
			$error = "Password is empty";
		} else {
			require_once './SQLConnect.php';
			if (SQLConnect::addUser(($_POST["login"]), $_POST["password"])) {
				mkdir("{$_POST["login"]}");
				header("Location:Login.php");
			} else {
				$error = 'User exist';
			}
		}
	}
}
	if (!empty($_SESSION['login'])) {
		header("Location:index.php");
	}
?>
<html>
    <head>
		<link href="style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	
	
	<table border="0" cellpadding="0" cellspacing="0" class="tbl1" width="100%">
  <tr> 
    <td colspan="4"></td>
  </tr>
  <tr valign="top"> 
    <td width="60%" height="91"><img src="single_pixel.gif" width="1" height="140"></td>
    <td width="40%" height="91" colspan="3" valign="top" align="center"> 

    </td>
  </tr>
  <tr> 
    <td colspan="3"> 
  <tr> 
    <td valign="top" colspan="4"> 
      <table width="90%" border="0" cellspacing="45">
       <tr>
        <td width="8%" valign="top"><img src="single_pixel.gif" width="140" height="1"><br>
		<p>
			<a href="login.php">Вход</a><br>
	</td>
        <td width="92%"> 
		<?php 
			if (isset($error)){
			echo "<p>$error";
			}
		?>
		<form action="Registration.php" method="POST" enctype='multipart/form-data'>
		<table border="0">
            <tr><td><p>Логин <input type="text" name="login"></td>
            <td><p>Пароль <input type="password" name="password"></td></tr>
		</table>	
            <input type="submit" value="Регистрация"><br>
        </form>
    </body>
	</td>
       </tr>
      </table>
      <h2>&nbsp;</h2>
      </td>
  </tr>
</table>
	

        </form>
    </body>
</html>