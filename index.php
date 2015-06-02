<?php
session_start();
if (empty($_SESSION['login'])) {
    header("Location:Login.php");
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
                                <h3>hello, <?php echo ucfirst($_SESSION['login']); ?></h3>
                                <form action="GalleryEcho.php" method="POST" enctype='multipart/form-data'>
                                    <p>Уменьшить картинки в<input type="number" min="2" max="6" name="SliceSize"> раз <br>
                                        Уменьшить gif? <br>
                                        <input type="radio" name="gifSlice" value="true">Да<br>
                                        <input type="radio" name="gifSlice" value="" checked="checked">Нет<br><br>
                                        <input type="submit" value="Отобразить галерею"><br>



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