<?php
//自定义数据库连接函数
function mysql_connect_db()
{
$mysql_server_name='localhost'; //数据库服务器
$mysql_username='root'; //数据库用户名
$mysql_password=''; //数据库密码
$mysql_database='ganbu'; //数据库名
$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("数据库连接失败");
mysql_query("set names gbk");
mysql_select_db($mysql_database,$conn);
return $conn;

}
mysql_connect_db();//;调用函数打开数据库连接
//
@extract($_POST);
@extract($_GET);//处理linux下变量传递
//获取第一条记录
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