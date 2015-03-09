<?
session_start();
require("./mysql_connect.php");
//管理员
if($select==1)
{
$sql="select * from admin where admin_name='$user' and admin_psw='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('管理员帐号或者密码错误'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
$_SESSION[login_name]=$user;
echo "<script>alert('管理员登录成功');location.href='admin/index.php';</script>";
	}
	}
//干部
	if($select==2)
{
$sql="select * from workers where uname='$user' and pwd='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('干部帐号或者密码错误'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
				$_SESSION[login_name]=$user;
				$_SESSION[login_realname]=$login[wname];
				$_SESSION[login_bumen]=$login[bumen];
$_SESSION[login_mid]=$login[id];
echo "<script>alert('干部登录成功');location.href='ganbu/index.php';</script>";
	}
	}
	//村民
if($select==3)
{
$sql="select * from cunmin where uname='$user' and pwd='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('村民帐号或者密码错误'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
				$_SESSION[login_name]=$user;
				$_SESSION[login_realname]=$login[cname];


echo "<script>alert('村民登录成功');location.href='user/index.php';</script>";
	}
	}

?>