<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$userid=$_SESSION[login_name];
$sql="select * from minyi_cheping where  userid='$userid'";
$r=getfirst($sql);
if(empty($r))
	{

?><form id="form1" name="form1" method="post" action="minyi_save.php?act=save">
 <table width="95%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="8%"   class="optiontitle">���</td>
          <td width="40%"   class="optiontitle">������Ŀ</td>
          <td width="52%"   class="optiontitle">�������</td>
        </tr>
        <?php
		$sql="select * from minyi";
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
10��
            <input type="radio" name="xuan[<?=$i?>]" id="radio2" value="9" />

   9��       <input type="radio" name="xuan[<?=$i?>]" id="radio3" value="8" />

       8��       <input type="radio" name="xuan[<?=$i?>]" id="radio3" value="7" />

      7��
     </label></td>
 </tr><input type='hidden' name='mid[]' value='<?=$d[id]?>' />
<?
		}


?>
		</table>
        <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle"><input type="submit" name="button" id="button" value="�ύ����" /></td>
        </tr>
		</table>
<input type='hidden' name='num' value='<?=$i?>' />
</form>
<?
	}
else
{
	?>  <table width="95%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">

 <tr align="center" bgcolor="#F2FDFF">
          <td width="8%"   class="optiontitle">���</td>
          <td width="40%"   class="optiontitle">������Ŀ</td>
          <td width="52%"   class="optiontitle">�������</td>
        </tr>
        <?php
		$sql="select * from minyi_cheping where userid='$userid' and utype='����' order by mid ASC";

		$res=mysql_query($sql);
		$i=0;
$total=0;
		while($d=mysql_fetch_array($res))
		{
			$i++;
		?>
 <tr align="center" bgcolor="#F2FDFF">
   <td   class="optiontitle">&nbsp;<?=$i?></td>
   <td   class="optiontitle"><?=get_name($d[mid],"minyi")?></td>
   <td   class="optiontitle">
��Ĵ��:<?=$d[fenshu]?> ��
     </label></td>
 </tr>
<?
		$total+=$d[fenshu];
		}


?>
		</table>
        <table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
        <tr align="center" bgcolor="#F2FDFF">
          <td   class="optiontitle">�ܷ�:<?=$total?> ��</td>
        </tr>
		</table>

	<?
		}
		?>