<?
require("../mysql_connect.php");
;//包含文件

$sql="INSERT INTO `admin` (`admin_name` ,`admin_psw` ,
`Levels`) VALUES ('$Username' , '$Password_new' , 0 )";

$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('管理员账号增加成功');location.href='admin.php';</SCRIPT>";
?>