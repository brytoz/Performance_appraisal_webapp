<?
require("../mysql_connect.php");
//�����ļ�
$sql="delete from admin where id=$id";
$result=mysql_query($sql);
echo "<SCRIPT LANGUAGE='JavaScript'>alert('����Ա�˺�ɾ���ɹ�');location.href='admin.php';</SCRIPT>";
?>