<?
require("../mysql_connect.php");
;//�����ļ�

$sql="INSERT INTO `admin` (`admin_name` ,`admin_psw` ,
`Levels`) VALUES ('$Username' , '$Password_new' , 0 )";

$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('����Ա�˺����ӳɹ�');location.href='admin.php';</SCRIPT>";
?>