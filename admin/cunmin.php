<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
//删除
if($mark=="del")
{
	$sql="delete from cunmin where id=$id";
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
          <td colspan="8"  class="optiontitle">村民管理</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">村民姓名</td>
   <td width="15%"  class="optiontitle">登录帐号</td>
   <td width="13%"  class="optiontitle">密码</td>
   <td width="10%"  class="optiontitle">性别</td>
   <td width="12%"  class="optiontitle">操作</td>
 </tr>
 <?
 $sql="select * from cunmin order by id DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {

 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td  class="optiontitle"><?=$data[cname]?></td>
   <td  class="optiontitle"><?=$data[uname]?></td>
   <td  class="optiontitle"><?=$data[pwd]?></td>
   <td  class="optiontitle"><?=$data[sex]?></td>
   <td  class="optiontitle">    <a href="?id=<?=$data[id]?>&mark=del" onClick="return ConfirmDel();">删除</a> </td>
 </tr>
 <?
 }
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td colspan="8"  class="optiontitle">&nbsp;</td>
  </tr>

</table>
