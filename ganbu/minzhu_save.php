<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
//print_r($_POST);

//if($xuan)
$userid=$_SESSION[login_name];
for($i=1;$i<=$num;$i++)
{
if($xuan[$i]=="")
{
echo "<script>alert('������һ��δѡ��');history.back();</script>";
	exit;
}
}
for($i=1;$i<=$num;$i++)
{
	$fenshu=$xuan[$i];
$mid1=$mid[$i-1];
	$sql="insert into minzhu_cheping (wid,mid,userid,fenshu,utype) values ('$wid','$mid1','$userid','$fenshu','�ɲ�')";
	//echo $sql;

$res=mysql_query($sql);

}//exit;
if($res)
	{
	echo "<script>alert('��ֳɹ�');location.href='minzhu_list.php';</script>";
	exit;
	}
	else
	{
	exit("ʧ����");
	}
?>
