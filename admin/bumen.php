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
<title>部门管理</title>
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
    <td height="30" bgcolor="#E7F3FB"><div align="center" >部门管理</div></td>
  </tr>
  <tr>
    <td  bgcolor="#E7F3FB"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
$sql="select * from bumen";
$result=mysql_query($sql);

	   ?>
	   <tr>
          <td width="337" height="20" bgcolor="#FFFFFF"><div align="center">部门名称</div></td>



 <td width="260" bgcolor="#FFFFFF"><div align="center">操作</div></td>
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
           <a href="bumen_add.php?id=<?=$bumen[id]?>">修改</a>
<a href="?id=<?=$bumen[id]?>&act=Del" onClick="return confirm('您确定要删除吗?')">删除</a>

          </div></td>
        </tr>
		<?php
	        }

		?>
    </table></td>
  </tr>
</table>
