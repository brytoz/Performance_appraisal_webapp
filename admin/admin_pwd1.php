<?
require("../mysql_connect.php");
//�����ļ�

$sql="update admin set admin_name='$Username',admin_psw='$Password_new' where id=$id";
$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('����Ա�˺��޸ĳɹ�');location.href='admin.php';</SCRIPT>";
?>