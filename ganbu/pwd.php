<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$ganbuid=$_SESSION[login_mid];
	$sql="select * from workers where id=$ganbuid";
	$data=getfirst($sql);
if($act=="save")
{
//id不等于空执行修改
$sql="update workers set pwd='$pwd' where id=$id";


$res=mysql_query($sql);
	if($res)
	{


echo "<script>alert('修改成功');location.href='pwd.php';</script>";
	exit;
	}
	else
	{
	exit ("修改失败了");
	}
	}
?><meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$ganbuid?>&flag=<?=$flag?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">添加/修改</td>
        </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">干部名称：</td>
<td align="left"><input name="wname" type="text" id="wname" size="20" value="<?=$data[wname]?>" readonly>*不可更改</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 干部帐号：</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value="<?=$data[uname]?>" readonly>*不可更改</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">干部密码：</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>>*</td>
</tr>

<tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="修改密码">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>