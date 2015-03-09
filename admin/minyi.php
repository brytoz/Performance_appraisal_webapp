<?php
session_start();
include('./chk_admin.php');
include('../mysql_connect.php');
include('../function.php');


if($act=="Del")
{
$sql="select * from minyi_cheping";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('已有民意测评数据,不可以操作');history.back();</script>";
	exit;
	}
$sql="delete from minyi where id=$id";
$result=mysql_query($sql);

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>民意管理</title>
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
    <td height="30" bgcolor="#E7F3FB"><div align="center" >民意管理</div></td>
  </tr>
  <tr>
    <td  bgcolor="#E7F3FB"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
$sql="select * from minyi";
$result=mysql_query($sql);

	   ?>
	   <tr>
          <td width="337" height="20" bgcolor="#FFFFFF"><div align="center">民意名称</div></td>



 <td width="260" bgcolor="#FFFFFF"><div align="center">操作</div></td>
        </tr>
       <?php
	      while($minyi=mysql_fetch_array($result))
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $minyi[name];?></div></td>

           <td height="20" bgcolor="#FFFFFF">

           <div align="center">


          </div>
           <div align="center">
           <a href="minyi_add.php?id=<?=$minyi[id]?>">修改</a>
<a href="?id=<?=$minyi[id]?>&act=Del" onClick="return confirm('您确定要删除吗?')">删除</a>

          </div></td>
        </tr>
		<?php
	        }

		?>
    </table></td>
  </tr>
</table>
