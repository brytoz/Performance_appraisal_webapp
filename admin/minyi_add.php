<?php
session_start();
include('./chk_admin.php');
include('../mysql_connect.php');
include('../function.php');
$sql="select * from minyi_cheping";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('���������������,�����Բ���');history.back();</script>";
	exit;
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
<link rel="stylesheet" type="text/css" href="images/admincp.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

</head>

<body topmargin="0" leftmargin="0" bottommargin="0">

<?php
if($id!="")
{
	$sql="select * from minyi where id=$id";
$data=getfirst($sql);
}
if($act=="save")
{
if($p0=="")
	{
echo "<script>alert('�������Ʋ���Ϊ��');history.back();</script>";
	exit;
}
if($id!="")
	{
	$sql="update minyi set name='$p0' where id=$id";
	if(mysql_query($sql))
	{
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=minyi.php\">";
		exit;
		}
	 else
	exit ("���ʧ��");
}
 $sql="insert into minyi (name) values ('$p0')";
 if(mysql_query($sql))
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=minyi.php\">";
 else
	 echo "���ʧ��";
}

?><p>
<div align="center">
  <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
    <form name="form1" method="post" action="?act=save&id=<?=$id?>" onSubmit="return chkinput(this)">
	<tr>
      <td height="30" bgcolor="#E7F3FB"><div align="center" >����޸�����</div></td>
    </tr>
    <tr>
      <td bgcolor="#E7F3FB"><table width="780" border="0" align="center" cellpadding="0" cellspacing="1">


        <tr>
          <td height="25" bgcolor="#FFFFFF"><div align="center">��������</div></td>
          <td bgcolor="#FFFFFF"><div align="left"><input type="text" name="p0" class="inputcss" size="20" value="<?=$data[name]?>"></div></td>
          </tr>
           <tr>

          </tr>








      </table>
	  </td>
    </tr>
     <tr>
      <td height="20"><div align="center" ><input type="submit" value="��������" class="buttoncss">&nbsp;</div></td>
    </tr>
	</form>
  </table>
</p>
<p>&nbsp;</p>
</form>
</body>
</html>
