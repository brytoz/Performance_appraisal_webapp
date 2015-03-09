<?
require("../mysql_connect.php");
//包含文件

$sql="update admin set admin_name='$Username',admin_psw='$Password_new' where id=$id";
$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('管理员账号修改成功');location.href='admin.php';</SCRIPT>";
?>