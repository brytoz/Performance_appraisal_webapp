<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
if($id!="")
{//ȡ��workers�����������޸�
	$sql="select * from workers where id=$id";
	$data=getfirst($sql);
}

if($act=="save")
{
if($id!="")
{
	$pic=upload_file("pic",$data[pic]);

//id�����ڿ�ִ���޸�
$sql="update workers set wname='$wname',uname='$uname',pwd='$pwd',bumen='$bumen',tel='$tel',sex='$sex',pic='$pic',xueli='$xueli',zhiwu='$zhiwu',birth='$birth',minzhu='$minzhu',mianmao='$mianmao',renzhi='$renzhi' where id=$id";


$res=mysql_query($sql);
	if($res)
	{
		if($flag==1)

echo "<script>alert('�޸ĳɹ�');location.href='my.php';</script>";
	else
	echo "<script>alert('�޸ĳɹ�');location.href='workers.php';</script>";
	exit;
	}
	else
	{
	exit ("�޸�ʧ����");
	}
}
if($id=="")
{
//idΪ��ִ�в������
$pic=upload_file("pic","");
if($wname=="" || $uname=="" ||$pwd=="")
	{
echo "<script>alert('��Ϣ������');history.back();</script>";
	exit;
}
$sql="select * from workers where wname='$wname' or uname='$uname'";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('�ɲ��˺Ż��������Ѵ���');history.back();</script>";
	exit;
}
$sql="insert into workers (wname,uname,pwd,bumen,tel,sex,pic,xueli,zhiwu,birth,minzhu,mianmao,renzhi) values ('$wname','$uname','$pwd','$bumen','$tel','$sex','$pic','$xueli','$zhiwu','$birth','$minzhu','$mianmao','$renzhi')";

$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('��ӳɹ�');location.href='workers.php';</script>";
	exit;
	}
	else
	{
	exit("���ʧ����");
	}
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>&flag=<?=$flag?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">���/�޸�</td>
        </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">�ɲ����ƣ�</td>
<td align="left"><input name="wname" type="text" id="wname" size="20" value=<?=$data[wname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> �ɲ��ʺţ�</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value=<?=$data[uname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">�ɲ����룺</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> �������ţ�</td>
<td align="left"><select name="bumen" id="bumen">
  <?
  $sql="select * from bumen order by id DESC";
 $res=mysql_query($sql);
 while($rs=mysql_fetch_array($res))
 {
	 ?>

	  <option value="<?=$rs[id]?>" <? if($rs[id]==$data[cartype]) echo "selected"; ?>><?=$rs[name]?></option>
	 <?
	 }
  ?>

  </select></td>
</tr><tr align="center" bgcolor="#F2FDFF">
<td align="right"> ���գ�</td>
<td align="left"><input name="birth" type="text" id="birth" size="20" value=<?=$data[birth]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ��ϵ�绰��</td>
<td align="left"><input name="tel" type="text" id="tel" size="20" value=<?=$data[tel]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ����ְ��</td>
<td align="left"><input name="zhiwu" type="text" id="zhiwu" size="20" value=<?=$data[zhiwu]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> �Ա�</td>
<td align="left"><select name="sex" id="sex">

	  <option value="��" >��</option>

	  <option value="Ů" >Ů</option>

  </select></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">�ɲ���Ƭ��</td>
<td align="left"><label for="textfield"></label>
  <input type="file" name="pic" id="textfield" /></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> ������ò��</td>
<td align="left"><select name="mianmao" id="sex">
  <option value="��Ա" selected="selected">��Ա</option>
  <option value="��Ա">��Ա</option>
  <option value="Ⱥ��">Ⱥ��</option>
  <option value="��������">��������</option>
</select></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">ѧ����</td>
<td align="left"><select name="xueli" id="sex">
  <option value="����" selected="selected">����</option>
  <option value="�о���">�о���</option>
  <option value="��ʿ">��ʿ</option>
  <option value="��ר">��ר</option>
  <option value="��ʿ��">��ʿ��</option>
  <option value="��ר����">��ר����</option>
</select></td>
</tr>
<tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="�ύ">
          	<input type="button" name="Submit2" value="����" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>