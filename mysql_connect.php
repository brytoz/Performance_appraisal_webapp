<?php
//�Զ������ݿ����Ӻ���
function mysql_connect_db()
{
$mysql_server_name='localhost'; //���ݿ������
$mysql_username='root'; //���ݿ��û���
$mysql_password=''; //���ݿ�����
$mysql_database='ganbu'; //���ݿ���
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("���ݿ�����ʧ��");
mysql_query("set names gbk");
mysql_select_db($mysql_database,$conn);
return $conn;

}
mysql_connect_db();//;���ú��������ݿ�����
//
@extract($_POST);
@extract($_GET);//����linux�±�������
//��ȡ��һ����¼
function getfirst($sql)
{
	$res=mysql_query($sql);
	$rows=mysql_fetch_array($res);
	return $rows;
}
//
function getcount($sql){
	$res=mysql_query($sql);

return mysql_num_rows($res);
}
function get_name($id,$table)
{
	$sql="select * from $table where id=$id";
	$rows=getfirst($sql);

	return $rows[name];
}
?>