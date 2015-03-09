<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
//删除
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
   if(confirm("确定要删除吗？"))
     return true;
   else
     return false;

}
</SCRIPT>
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">制作民主测评表</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">干部姓名</td>

   <td width="14%"  class="optiontitle">所属部门</td>
   <td width="10%"  class="optiontitle">性别</td>
   <td width="12%"  class="optiontitle">照片</td>
   <td width="12%"  class="optiontitle">制作</td>
 </tr>
 <?
 $sql="select * from workers order by id DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {
	 if($data[pic]<>'') $a='<a href="../userpic/'.$data[pic].'" target="_blank">查看</a>';
	 else
		 $a="无照片";
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td  class="optiontitle"><?=$data[wname]?></td>

   <td  class="optiontitle"><?=get_name($data[bumen],"bumen")?></td>
   <td  class="optiontitle"><?=$data[sex]?></td>
   <td  class="optiontitle"><?=$a?></td>
   <td  class="optiontitle"><a href="zhizuo_minzhu.php?id=<?=$data[id]?>" target="_blank">预览民主测评表</a>  </td>
 </tr>
 <?
 }
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td colspan="8"  class="optiontitle">&nbsp;</td>
  </tr>

</table>
