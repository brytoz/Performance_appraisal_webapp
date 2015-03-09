<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$userid=$_SESSION[login_name];
//取出cunmin表数据用于修改
	$sql="select * from cunmin where uname='$userid'";
	$result=mysql_query($sql);
$data=mysql_fetch_array($result);


if($act=="save")
{
	if($uname=="" ||$pwd=="" || $cname=="")
	{
echo "<script>alert('信息不完整');history.back();</script>";
	exit;
}

	$sql="update cunmin set pwd='$pwd',dizhi='$dizhi',tel='$tel',sex='$sex',cname='$cname' where uname='$userid'";
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

}?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr>
    <td height="19" colspan="4" class="title"><div align="center" class="title">修改我的资料</div></td>
  </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 登录帐号：</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value="<?=$data[uname]?>" readonly>* (不可更改)</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 登录密码：</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 你的姓名：</td>
<td align="left"><input name="cname" type="text" id="cname" size="20" value=<?=$data[cname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 家庭地址：</td>
<td align="left"><input name="dizhi" type="text" id="dizhi" size="20" value=<?=$data[dizhi]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 联系电话：</td>
<td align="left"><input name="tel" type="text" id="tel" size="20" value=<?=$data[tel]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 性别：</td>
<td align="left"><select name="sex" id="sex">

	  <option value="男" >男</option>

	  <option value="女" >女</option>

  </select></td>
</tr><tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="修改">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>