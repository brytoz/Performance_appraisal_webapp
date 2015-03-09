<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">查看民主测评表</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">干部姓名</td>

   <td width="14%"  class="optiontitle">所属部门</td>
      <td width="14%"  class="optiontitle">总分</td>
      <td width="14%"  class="optiontitle">投票人数</td>
      <td width="14%"  class="optiontitle">平均分</td>

   <td width="15%"  class="optiontitle">得分汇总查看</td>
 </tr>
 <?
 $sql="select sum(b.fenshu) as fenshu_num, count(distinct b.userid) as tnum,a.wname,a.bumen,a.id from workers as a left join minzhu_cheping as b on  a.id=b.wid group by b.wid order by fenshu_num DESC";
 $res=mysql_query($sql);
 while($data=mysql_fetch_array($res))
 {
	//$sql="select sum(fenshu) as fenshu_num from minzhu_cheping where wid='$data[id]'";

		//$res1=mysql_query($sql);

		//$d=mysql_fetch_array($res1);
$a=round($data[fenshu_num]/$data[tnum],2);
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td  class="optiontitle"><?=$data[wname]?></td>

   <td  class="optiontitle"><?=get_name($data[bumen],"bumen")?></td>
   <td  class="optiontitle"><?=$data[fenshu_num]?></td>
   <td  class="optiontitle"><?=$data[tnum]?></td>
   <td  class="optiontitle"><?=$a?></td>

   <td  class="optiontitle"><a href="view.php?id=<?=$data[id]?>" target="_blank">得分详情查看</a>  </td>
 </tr>
 <?
 }
 ?>
 <tr align="center" bgcolor="#F2FDFF">
   <td colspan="8"  class="optiontitle"><a href="javascript:print();">打印结果</a> <a href="excel2.php" target="_blank">导出结果</a></td>
  </tr>

</table>
