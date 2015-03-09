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
   if(confirm("确定要删除吗？"))
     return true;
   else
     return false;

}
</SCRIPT>
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">干部民主测评表</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">干部姓名</td>

   <td width="14%"  class="optiontitle">所属部门</td>
   <td width="10%"  class="optiontitle">性别</td>
   <td width="12%"  class="optiontitle">照片</td>
   <td width="12%"  class="optiontitle">投票</td>
 </tr>
 <?
 $userid=$_SESSION[login_name];

 $sql="select * from workers order by id DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {
	 if($data[pic]<>'') $a='<a href="../userpic/'.$data[pic].'" target="_blank">查看</a>';
	 else
		 $a="无照片";
$sql="select * from minzhu_cheping where wid='$data[id]' and userid='$userid'";
$r=getfirst($sql);
if(!empty($r))
	$b="<a href=d_view.php?id=$data[id]&userid=$userid&utype=村民>查看打分结果</a>";
else
	$b='<a href="d_minzhu.php?id='.$data[id].'" target="_blank">开始打分</a>';
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
