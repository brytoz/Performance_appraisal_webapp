<?php
session_start();
include('./chk_admin.php');
include('../mysql_connect.php');
include('../function.php');


if($act=="Del")
{
$sql="delete from bumen where id=$id";
$result=mysql_query($sql);

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���Ź���</title>
<link rel="stylesheet" type="text/css" href="images/admincp.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

</head>

<body topmargin="0" leftmargin="0" bottommargin="0">




<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="30" bgcolor="#E7F3FB"><div align="center" >���Ź���</div></td>
  </tr>
  <tr>
    <td  bgcolor="#E7F3FB"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
$sql="select * from bumen";
$result=mysql_query($sql);

	   ?>
	   <tr>
          <td width="337" height="20" bgcolor="#FFFFFF"><div align="center">��������</div></td>



 <td width="260" bgcolor="#FFFFFF"><div align="center">����</div></td>
        </tr>
       <?php
	      while($bumen=mysql_fetch_array($result))
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $bumen[name];?></div></td>

           <td height="20" bgcolor="#FFFFFF">

           <div align="center">


          </div>
           <div align="center">
           <a href="bumen_add.php?id=<?=$bumen[id]?>">�޸�</a>
<a href="?id=<?=$bumen[id]?>&act=Del" onClick="return confirm('��ȷ��Ҫɾ����?')">ɾ��</a>

          </div></td>
        </tr>
		<?php
	        }

		?>
    </table></td>
  </tr>
</table>
