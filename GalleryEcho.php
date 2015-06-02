<?php
require_once './Gallery.php';
session_start();
if (empty($_SESSION['login'])) {
    header("Location:Login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css">
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
                                <div id="updown"></div>
                                <script language="JavaScript">
                                    //Miracles and Magic 
                                    var updownElem = document.getElementById('updown');
                                    var pageYLabel = 0;
                                    updownElem.onclick = function ()
                                    {
                                        var pageY = window.pageYOffset || document.documentElement.scrollTop;
                                        switch (this.className)
                                        {
                                            case 'up':
                                                pageYLabel = pageY;
                                                window.scrollTo(0, 0);
                                                this.className = 'down';
                                                break;

                                            case 'down':
                                                window.scrollTo(0, pageYLabel);
                                                this.className = 'up';
                                        }
                                    };
                                    window.onscroll = function ()
                                    {
                                        var pageY = window.pageYOffset || document.documentElement.scrollTop;
                                        var innerHeight = document.documentElement.clientHeight;

                                        switch (updownElem.className)
                                        {
                                            case '':
                                                if (pageY > innerHeight)
                                                {
                                                    updownElem.className = 'up';
                                                }
                                                break;

                                            case 'up':
                                                if (pageY < innerHeight)
                                                {
                                                    updownElem.className = '';
                                                }
                                                break;

                                            case 'down':
                                                if (pageY > innerHeight)
                                                {
                                                    updownElem.className = 'up';
                                                }
                                                break;

                                        }
                                    };
                                </script>
                                <h3>hello, <?php echo ucfirst($_SESSION['login']), "<br>"; ?></h3>
                                <?php
                                try {
                                    $dirPath = $_SESSION['login'];
                                    $gifSclice = (bool) $_POST['gifSlice'];
                                    $_POST['SliceSize'] = (int) $_POST['SliceSize'];
                                    if ($_POST['SliceSize'] === 0) {
                                        $_POST['SliceSize'] = 1;
                                    }
                                    $gallery = new Gallery($dirPath);
                                    $gallery->GalleryOutput($_POST['SliceSize'], $gifSclice);
                                } catch (Exception $ex) {
                                    die($ex->getMessage() . " in " . print_r($ex->getTrace(), true));
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <h2>&nbsp;</h2>
                </td>
            </tr>
        </table>
    </body>
</html>
