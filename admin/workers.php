<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
//ɾ��
if($mark=="del")
{
	$sql="delete from workers where id=$id";
$result=mysql_query($sql);

}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<SCRIPT language=javascript>

function ConfirmDel()
{
   if(confirm("ȷ��Ҫɾ����"))
     return true;
   else
     return false;

}
</SCRIPT>
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">�ɲ�����   <a href="workersAdd.php">��Ӹɲ�</a></td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">�ɲ�����</td>
   <td width="15%"  class="optiontitle">��¼�ʺ�</td>
   <td width="13%"  class="optiontitle">����</td>
   <td width="14%"  class="optiontitle">��������</td>
   <td width="10%"  class="optiontitle">�Ա�</td>
   <td width="12%"  class="optiontitle">��Ƭ</td>
   <td width="12%"  class="optiontitle">����</td>
 </tr>
 <?
 $sql="select * from workers order by id DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {
	 if($data[pic]<>'') $a='<a href="../userpic/'.$data[pic].'" target="_blank">�鿴</a>';
	 else
		 $a="����Ƭ";
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td  class="optiontitle"><?=$data[wname]?></td>
   <td  class="optiontitle"><?=$data[uname]?></td>
   <td  class="optiontitle"><?=$data[pwd]?></td>
   <td  class="optiontitle"><?=get_name($data[bumen],"bumen")?></td>
   <td  class="optiontitle"><?=$data[sex]?></td>
   <td  class="optiontitle"><?=$a?></td>
   <td  class="optiontitle"><a href="workersAdd.php?id=<?=$data[id]?>">�޸�</a>    <a href="?id=<?=$data[id]?>&mark=del" onClick="return ConfirmDel();">ɾ��</a> </td>
 </tr>
 <?
 }
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td colspan="8"  class="optiontitle">&nbsp;</td>
  </tr>

</table>
