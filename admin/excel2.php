<?php
$filemnam="����÷ֻ���.xls";
header("Content-type:aplication/vnd.ms-excel");
header("Content-Disposition:filename=$filemnam");
include("../mysql_connect.php");
include("../function.php");

?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="8"  class="optiontitle">�鿴����������</td>
        </tr>
 <tr align="center" bgcolor="#F2FDFF">
   <td width="15%"  class="optiontitle">�ɲ�����</td>

   <td width="14%"  class="optiontitle">��������</td>
      <td width="14%"  class="optiontitle">�ܷ�</td>
      <td width="14%"  class="optiontitle">ͶƱ����</td>
      <td width="14%"  class="optiontitle">ƽ����</td>

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


 </tr>
 <?
 }
 ?>


</table>
