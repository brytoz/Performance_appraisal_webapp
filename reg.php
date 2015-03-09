<?php
session_start();
require("./mysql_connect.php");
if($act=="save")
{
	if($uname=="" ||$pwd=="" || $cname=="")
	{
echo "<script>alert('信息不完整');history.back();</script>";
	exit;
}
$sql="select * from cunmin where  uname='$uname'";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('注册帐号已存在');history.back();</script>";
	exit;
}
	$sql="insert into cunmin (cname,uname,pwd,dizhi,tel,sex) values ('$cname','$uname','$pwd','$dizhi','$tel','$sex')";
$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('注册成功,请登录');location.href='index.php';</script>";
	exit;
	}
	else
	{
	exit("注册失败了");
	}
}?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr>
    <td height="19" colspan="4" class="title"><div align="center" class="title">村民注册</div></td>
  </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 登录帐号：</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value=<?=$data[uname]?>>*</td>
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
            <input type="Submit" name="Submit" value="注册">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>