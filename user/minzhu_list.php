<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");

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
          <td colspan="8"  class="optiontitle">�ɲ�����������</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">�ɲ�����</td>

   <td width="14%"  class="optiontitle">��������</td>
   <td width="10%"  class="optiontitle">�Ա�</td>
   <td width="12%"  class="optiontitle">��Ƭ</td>
   <td width="12%"  class="optiontitle">ͶƱ</td>
 </tr>
 <?
 $userid=$_SESSION[login_name];

 $sql="select * from workers order by id DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {
	 if($data[pic]<>'') $a='<a href="../userpic/'.$data[pic].'" target="_blank">�鿴</a>';
	 else
		 $a="����Ƭ";
$sql="select * from minzhu_cheping where wid='$data[id]' and userid='$userid'";
$r=getfirst($sql);
if(!empty($r))
	$b="<a href=d_view.php?id=$data[id]&userid=$userid&utype=����>�鿴��ֽ��</a>";
else
	$b='<a href="d_minzhu.php?id='.$data[id].'" target="_blank">��ʼ���</a>';
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td  class="optiontitle"><?=$data[wname]?></td>

   <td  class="optiontitle"><?=get_name($data[bumen],"bumen")?></td>
   <td  class="optiontitle"><?=$data[sex]?></td>
   <td  class="optiontitle"><?=$a?></td>
   <td  class="optiontitle"><?=$b?>  </td>
 </tr>
 <?
 }
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td colspan="8"  class="optiontitle">&nbsp;</td>
  </tr>

</table>
