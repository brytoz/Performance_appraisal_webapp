<?
require("../mysql_connect.php");
//包含文件
$sql="select * from admin where id=$id";
$result=mysql_query($sql);
$data=mysql_fetch_array($result);
?>
<script>
function check_form()
{

	var name = document.getElementById("Username");
	var psw = document.getElementById("Password_new");
	var psw2 = document.getElementById("Password_new2");

if(name.value == "")
	{
		alert("姓名不能为空");
		name.focus();
		return false;
	}
if(psw.value == "")
	{
		alert("密码不能为空");
		psw.focus();
		return false;
	}
	if(psw2.value == "")
	{
		alert("重复密码不能为空");
		psw2.focus();
		return false;
	}
	if(psw2.value != psw.value)
	{
		alert("2次密码不一致");
		psw2.focus();
		return false;
	}

document.form1.submit();

}
</script>
  <br><link href="admin_style.css" rel="stylesheet" type="text/css">

  <table width="97%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableBorder">
	<form action="admin_pwd1.php?id=<?=$data[id]?>" method="post" name="form1" onsubmit="check_form();return false;">
    <tr>
      <td colspan="3" class="title"></div></td>
    </tr>
    <tr>
      <td colspan="3" class="title2">&nbsp;用于修改网站的管理员</td>
    </tr>
    <tr>
      <td width="16%" class="table">&nbsp;管理员用户名</td>
      <td width="84%" colspan="2" class="table"><input name="Username" type="text" id="UserName3" value="<?=$data[admin_name]?>">
      &nbsp;<font class="alert"></font></td>
    </tr>

    <tr>
      <td class="table">&nbsp;输入新密码</td>
      <td colspan="2" class="table"><input name="Password_new" type="password" id="Password_new"></td>
    </tr>
    <tr valign="top">
      <td class="table"><p align="left">&nbsp;重新输入新密码</p></td>
      <td colspan="2" class="table"><input name="Password_new2" type="password" id="Password_new2"></td>
    </tr>

    <tr>
      <td colspan="3" class="table"><div align="center">
          <input type="submit" name="Submit3" value="提交">
&nbsp;
          <input type="reset" name="Submit22" value="重置">
      </div></td>
    </tr>
</form>
</table>


