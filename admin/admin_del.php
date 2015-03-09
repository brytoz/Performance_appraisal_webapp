<?
require("../mysql_connect.php");
//包含文件
$sql="delete from admin where id=$id";
$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('管理员账号删除成功');location.href='admin.php';</SCRIPT>";
?>