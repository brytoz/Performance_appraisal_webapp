<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$userid=$_SESSION[login_name];
$sql="select * from minzhu_cheping where wid='$id' and userid='$userid'";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('你已经打过分了');history.back();</script>";
	exit;
}
$sql="select * from workers where id=$id";
	$data=getfirst($sql);
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<form id="form1" name="form1" method="post" action="minzhu_save.php?act=save&wid=<?=$id?>">
<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle">

      预览民主测评表</td>
        </tr>
		</table>
        <table width="500"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="22%" align="right" >干部姓名</td>
          <td width="39%" align="left" ><?=$data[wname]?></td>
          <td width="39%" colspan="2" rowspan="4" align="center" ><img src="../userpic/<?=$data[pic]?>" width="120" height="120"></td>
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
          <td width="52%"   class="optiontitle">评价意见</td>
        </tr>
        <?php
		$sql="select * from minzhu";
		$res=mysql_query($sql);
		$i=0;

		while($d=mysql_fetch_array($res))
		{
			$i++;
		?>
 <tr align="center" bgcolor="#F2FDFF">
   <td   class="optiontitle">&nbsp;<?=$i?></td>
   <td   class="optiontitle"><?=$d[name]?></td>
   <td   class="optiontitle">     <input type="radio" name="xuan[<?=$i?>]" id="radio" value="10" />&nbsp;
10分
            <input type="radio" name="xuan[<?=$i?>]" id="radio2" value="9" />

   9分       <input type="radio" name="xuan[<?=$i?>]" id="radio3" value="8" />

       8分       <input type="radio" name="xuan[<?=$i?>]" id="radio3" value="7" />

      7分
     </label></td>
 </tr><input type='hidden' name='mid[]' value='<?=$d[id]?>' />
<?
		}


?>
		</table>
        <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle"><input type="submit" name="button" id="button" value="提交保存" /></td>
        </tr>
		</table>
        <p align="center"><a href="javascript:window.close()">关闭</a></p>
<input type='hidden' name='num' value='<?=$i?>' />
</form>