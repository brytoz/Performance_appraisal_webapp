<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$userid=$_SESSION[login_name];
//ȡ��cunmin�����������޸�
	$sql="select * from cunmin where uname='$userid'";
	$result=mysql_query($sql);
$data=mysql_fetch_array($result);


if($act=="save")
{
	if($uname=="" ||$pwd=="" || $cname=="")
	{
echo "<script>alert('��Ϣ������');history.back();</script>";
	exit;
}

	$sql="update cunmin set pwd='$pwd',dizhi='$dizhi',tel='$tel',sex='$sex',cname='$cname' where uname='$userid'";
$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('�޸ĳɹ�');location.href='pwd.php';</script>";
	exit;
	}
	else
	{
	exit ("�޸�ʧ����");
	}

}?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr>
    <td height="19" colspan="4" class="title"><div align="center" class="title">�޸��ҵ�����</div></td>
  </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ��¼�ʺţ�</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value="<?=$data[uname]?>" readonly>* (���ɸ���)</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ��¼���룺</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ���������</td>
<td align="left"><input name="cname" type="text" id="cname" size="20" value=<?=$data[cname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ��ͥ��ַ��</td>
<td align="left"><input name="dizhi" type="text" id="dizhi" size="20" value=<?=$data[dizhi]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ��ϵ�绰��</td>
<td align="left"><input name="tel" type="text" id="tel" size="20" value=<?=$data[tel]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> �Ա�</td>
<td align="left"><select name="sex" id="sex">

	  <option value="��" >��</option>

	  <option value="Ů" >Ů</option>

  </select></td>
</tr><tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="�޸�">
          	<input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>