 <?
 require("../mysql_connect.php");

 ?>
 <br><link href="admin_style.css" rel="stylesheet" type="text/css">

  <table width="97%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableBorder">
  <tr>
    <td colspan="4" class="title"><div align="center" class="title"> <div align="center" class="title"><a href="admin_add.php"> ��ӹ���Ա</a></div></td>
  </tr>
  <tr>
    <td colspan="4" class="title2">&nbsp;ѡ������Ҫ���ĵĹ���Ա��</td>
  </tr>
  <tr>
    <td width="6%" class="items">    <div align="center">���</div></td>
    <td width="13%" class="items"><div align="center"><span class="Forumrow">����Ա�˺�</span></div></td>


    <td width="6%" class="items"><div align="center">����</div></td>
  </tr>
<?
$sql="select * from admin order by id DESC";
$result=mysql_query($sql);
while($rs=mysql_fetch_array($result))
{
//print_r($rs);
?>
<tr onmouseover=this.style.backgroundColor="#F2F2F2" onmouseout=this.style.backgroundColor=""  bgcolor="#FFFFFF">
    <td><div align="center"><?   echo $rs[id]; ?></div></td>
    <td>&nbsp;<div align="center"><?   echo $rs["admin_name"]; ?></div></td>

    <td><div align="center">
	<a href="admin_pwd.php?id=<?   echo $rs[id]; ?>" >�޸�</a>

	<a href="admin_del.php?id=<?   echo $rs[id]; ?>" onclick="{if(confirm('��ȷ��Ҫɾ����ס����?')){return true;}return false;}">ɾ��</a></div></td>
  </tr>
  <?
}
		?>