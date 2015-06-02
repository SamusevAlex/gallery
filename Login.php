<?php
session_start();
if (preg_match("/^\w+$/", $_POST["login"]) and $_POST["password"] !== '') {
    require_once './SQLConnect.php';
    if (SQLConnect::CheckUser($_POST["login"], $_POST["password"])) {
        $_SESSION['login'] = strtolower($_POST["login"]);
        header("Location:{$_SERVER['HTTP_REFERER']}");
    } else {
        $error = 'User not exist';
    }
} else {
	if(isset($_POST['send']))
        $error = 'No valid data';
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
			<a href="Registration.php">Регистрация</a><br>
	</td>
        <td width="92%"> 
		<?php 
			if (isset($error)){
			echo "<p>$error";
			}
		?>
        <form action="Login.php" method="POST" enctype='multipart/form-data'>
		<table border="0">
            <tr><td><p>Логин <input type="text" name="login"></td>
            <td><p>Пароль <input type="password" name="password"></td></tr>
		</table>	
            <input type="submit" name="send" value="Войти"><br>
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