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
//id�����ڿ�ִ���޸�
$sql="update workers set pwd='$pwd' where id=$id";


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
	}
?><meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$ganbuid?>&flag=<?=$flag?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">���/�޸�</td>
        </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">�ɲ����ƣ�</td>
<td align="left"><input name="wname" type="text" id="wname" size="20" value="<?=$data[wname]?>" readonly>*���ɸ���</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> �ɲ��ʺţ�</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value="<?=$data[uname]?>" readonly>*���ɸ���</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">�ɲ����룺</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>>*</td>
</tr>

<tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="�޸�����">
          	<input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>