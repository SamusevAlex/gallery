<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location:Login.php");
}
if ($_POST["pixname"] == "") {
    $Name = $_FILES['pix']['name'];
} else {
    preg_match_all("/\.\w+$/u", $_FILES['pix']['name'], $row);
    $Name = $_POST["pixname"] . $row[0][0];
}
if (!preg_match("/^[\w.]+$/", $Name) and !empty($Name)) {
    $errors = 'Not valid name';
} else 
if (file_exists("{$_SESSION['login']}\\$Name") and $Name!='') {
    $errors = "$Name exists";
} else
if (preg_match("/gif$|png$|jpeg$/u", $_FILES['pix']['type'])) {
    move_uploaded_file($_FILES['pix']['tmp_name'], "{$_SESSION['login']}\\$Name");
} else {
	if(isset($_POST['send']))
		$errors = "not valid format";
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
			<a href="index.php">Главная</a><br>
			<a href='AddPic.php'>Добавить</a><br>
			<a href="logout.php">Выход</a></p>
	</td>
        <td width="92%"> 
		<?php 
			if (isset($errors)){
			echo "<p>$errors";
			}
		?>
        <h3>hello, <?php echo ucfirst($_SESSION['login']); ?></h3>
        <form action="AddPic.php" method="POST" enctype='multipart/form-data'>
            <p><input type='file' name='pix'><br><br>
            <p>Имя картинки<input type='text' name='pixname'><br><br>
            <input type="submit" name='send' value="Добавить картинку"><br>
        </form>
			</td>
       </tr>
      </table>
      <h2>&nbsp;</h2>
      </td>
  </tr>
</table>
    </body>
</html>