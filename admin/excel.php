<?php
$filemnam="����ͳ��.xls";
header("Content-type:aplication/vnd.ms-excel");
header("Content-Disposition:filename=$filemnam");
include("../mysql_connect.php");
include("../function.php");
?>
 <table width="95%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="8%"   class="optiontitle">���</td>
          <td width="20%"   class="optiontitle">������Ŀ</td>
          <td width="22%"   class="optiontitle">�����ܷ�</td>
	<td width="22%"   class="optiontitle">�������</td>
	<td width="22%"   class="optiontitle">ƽ����</td>

        </tr>
        <?php
		$sql="select sum(b.fenshu) as fenshu_num,a.name,count(distinct b.userid) as tnum  from minyi as a left join minyi_cheping as b on a.id=b.mid group by b.mid order by fenshu_num DESC ";
		$result=mysql_query($sql);
		$i=0;
$total=0;
		while($minyi=mysql_fetch_array($result))
		{
			$i++;
//$sql="select sum(fenshu) as fenshu_num from minyi_cheping where mid='$minyi[id]'";

		//$res=mysql_query($sql);

		//$d=mysql_fetch_array($res);
$a=round($minyi[fenshu_num]/$minyi[tnum],2);

		?>
 <tr align="center" bgcolor="#F2FDFF">
   <td   class="optiontitle">&nbsp;<?=$i?></td>
   <td   class="optiontitle"><?=$minyi[name]?></td>
   <td   class="optiontitle">�����ܷ�:<?=$minyi[fenshu_num]?> ��     </td>
   <td  class="optiontitle"><?=$minyi[tnum]?></td>
   <td  class="optiontitle"><?=$a?></td>
 </tr>
<?
			$total+=$d[fenshu_num];
		}


?>
		</table>