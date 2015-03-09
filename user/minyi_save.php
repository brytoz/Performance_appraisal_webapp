<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
$userid=$_SESSION[login_name];
for($i=1;$i<=$num;$i++)
{
if($xuan[$i]=="")
{
echo "<script>alert('至少有一个未选择');history.back();</script>";
	exit;
}
}
for($i=1;$i<=$num;$i++)
{
	$fenshu=$xuan[$i];
$mid1=$mid[$i-1];
	$sql="insert into minyi_cheping (mid,userid,fenshu,utype) values ('$mid1','$userid','$fenshu','村民')";
	//echo $sql;

$res=mysql_query($sql);

}//exit;
if($res)
	{
	echo "<script>alert('民意投票成功');location.href='mianyi.php';</script>";
	exit;
	}
	else
	{
	exit("失败了");
	}