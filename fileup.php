<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>WRITE</title>
<style>
td { font-size : 9pt; }
A:link { font : 9pt; color : black; text-decoration : none; 
font-family : arial; font-size : 9pt; }
A:visited { text-decoration : none; color : black; font-size : 9pt; }
A:hover { text-decoration : underline; color : black; 
font-size : 9pt; }
</style>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<?php
    session_start();
?>

<center>
<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
    <tr>
        <td height=20 align=center bgcolor=#999999>
        <font color=white><B>Write Review</B></font>
        </td>
    </tr>
    <tr>
        <td color=white>&nbsp;
       <table>
            <tr>
                <td width=60 align=left >Title</td>
                <td align=left >
                    <INPUT type=text name=title size=60 maxlength=35>
                </td>
            </tr>
            <tr>
                <td width=60 align=left >Visited Country</td>
                <td align=left >
                    <INPUT type=text name=place size=60 maxlength=35>
                </td>
            </tr>

            <tr>
                <td width=60 align=left >Content</td>
                <td align=left >
                    <TEXTAREA name=content cols=65 rows=15></TEXTAREA>
                </td>
            </tr>
            <tr>
                <td width=60 align=left>Input Picture</td>
                <td align=left>
                    <INPUT type="file" name="fileToUpload" id="fileToUpload">
                </td>
            </tr>
            <tr>
                <td colspan=10 align=center>
                    <INPUT type="submit" value="SAVE" name="submit">
                    &nbsp;&nbsp;
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
</form>

</body>
</html>
