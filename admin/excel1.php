<?php
$filemnam="$name.xls";
header("Content-type:aplication/vnd.ms-excel");
header("Content-Disposition:filename=$filemnam");
include("../mysql_connect.php");
include("../function.php");


$sql="select * from workers where id=$id";
	$data=getfirst($sql);
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle">

      查看我的投票民主测评表</td>
        </tr>
		</table>
        <table width="500"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="22%" align="right" >干部姓名</td>
          <td width="39%" align="left" ><?=$data[wname]?></td>
          <td width="39%" colspan="2" rowspan="4" align="center" >照片</td>
          </tr>
		 <tr align="center" bgcolor="#F2FDFF">
   <td align="right" >性别</td>
   <td align="left" ><?=$data[sex]?></td>
   </tr>

  <tr align="center" bgcolor="#F2FDFF">
   <td align="right" >部门</td>
   <td align="left" ><?=get_name($data[bumen],"bumen")?></td>
   </tr>


 <tr align="center" bgcolor="#F2FDFF">
   <td align="right" >现任职务</td>
   <td align="left" ><?=$data[zhiwu]?></td>
   </tr>



 		</table><br>
    <table width="95%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="8%"   class="optiontitle">序号</td>
          <td width="40%"   class="optiontitle">测评项目</td>
          <td width="52%"   class="optiontitle">单向总分</td>
        </tr>
        <?php
$sql="select * from minzhu";
$result=mysql_query($sql);
$i=0;
$total=0;
while($minzhu=mysql_fetch_array($result))
		     {
				 $i++;
		$sql="select sum(fenshu) as fenshu_num from minzhu_cheping where wid='$id' and mid='$minzhu[id]'";

		$res=mysql_query($sql);

		$d=mysql_fetch_array($res);

		?>
 <tr align="center" bgcolor="#F2FDFF">
   <td   class="optiontitle">&nbsp;<?=$i?></td>
   <td   class="optiontitle"><?=$minzhu[name]?></td>
   <td   class="optiontitle">
<?=$d[fenshu_num]?>
     </label></td>
 </tr>
<?
$total+=$d[fenshu_num];
}

?>
		</table>
        <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle">总分:<?=$total?> 分</td>
        </tr>
		</table>
