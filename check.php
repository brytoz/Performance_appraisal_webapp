<?
session_start();
require("./mysql_connect.php");
//����Ա
if($select==1)
{
$sql="select * from admin where admin_name='$user' and admin_psw='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('����Ա�ʺŻ����������'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
$_SESSION[login_name]=$user;
echo "<script>alert('����Ա��¼�ɹ�');location.href='admin/index.php';</script>";
	}
	}
//�ɲ�
	if($select==2)
{
$sql="select * from workers where uname='$user' and pwd='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('�ɲ��ʺŻ����������'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
				$_SESSION[login_name]=$user;
				$_SESSION[login_realname]=$login[wname];
				$_SESSION[login_bumen]=$login[bumen];
$_SESSION[login_mid]=$login[id];
echo "<script>alert('�ɲ���¼�ɹ�');location.href='ganbu/index.php';</script>";
	}
	}
	//����
if($select==3)
{
$sql="select * from cunmin where uname='$user' and pwd='$password'";
$res=mysql_query($sql);
$login=mysql_fetch_array($res);
	if(empty($login))
	{
		echo "<script>alert('�����ʺŻ����������'),history.back()</script>";
		exit;
	}
	else
		{
$_SESSION[login_type]=$select;
				$_SESSION[login_name]=$user;
				$_SESSION[login_realname]=$login[cname];


echo "<script>alert('�����¼�ɹ�');location.href='user/index.php';</script>";
	}
	}

?>