<?php
session_start();
include("./chk_admin.php");
include("../mysql_connect.php");
include("../function.php");
if($id!="")
{//取出workers表数据用于修改
	$sql="select * from workers where id=$id";
	$data=getfirst($sql);
}

if($act=="save")
{
if($id!="")
{
	$pic=upload_file("pic",$data[pic]);

//id不等于空执行修改
$sql="update workers set wname='$wname',uname='$uname',pwd='$pwd',bumen='$bumen',tel='$tel',sex='$sex',pic='$pic',xueli='$xueli',zhiwu='$zhiwu',birth='$birth',minzhu='$minzhu',mianmao='$mianmao',renzhi='$renzhi' where id=$id";


$res=mysql_query($sql);
	if($res)
	{
		if($flag==1)

echo "<script>alert('修改成功');location.href='my.php';</script>";
	else
	echo "<script>alert('修改成功');location.href='workers.php';</script>";
	exit;
	}
	else
	{
	exit ("修改失败了");
	}
}
if($id=="")
{
//id为空执行插入语句
$pic=upload_file("pic","");
if($wname=="" || $uname=="" ||$pwd=="")
	{
echo "<script>alert('信息不完整');history.back();</script>";
	exit;
}
$sql="select * from workers where wname='$wname' or uname='$uname'";
$r=getfirst($sql);
if(!empty($r))
	{
echo "<script>alert('干部账号或者姓名已存在');history.back();</script>";
	exit;
}
$sql="insert into workers (wname,uname,pwd,bumen,tel,sex,pic,xueli,zhiwu,birth,minzhu,mianmao,renzhi) values ('$wname','$uname','$pwd','$bumen','$tel','$sex','$pic','$xueli','$zhiwu','$birth','$minzhu','$mianmao','$renzhi')";

$res=mysql_query($sql);
	if($res)
	{
	echo "<script>alert('添加成功');location.href='workers.php';</script>";
	exit;
	}
	else
	{
	exit("添加失败了");
	}
}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<table width="96%"  border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#aec3de">
<form name="form1" method="post" action="?act=save&id=<?=$id?>&flag=<?=$flag?>" enctype="multipart/form-data" onSubmit="return check()">
 <tr align="center" bgcolor="#F2FDFF">
          <td colspan="2"  class="optiontitle">添加/修改</td>
        </tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">干部名称：</td>
<td align="left"><input name="wname" type="text" id="wname" size="20" value=<?=$data[wname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 干部帐号：</td>
<td align="left"><input name="uname" type="text" id="uname" size="20" value=<?=$data[uname]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">干部密码：</td>
<td align="left"><input name="pwd" type="text" id="pwd" size="20" value=<?=$data[pwd]?>>*</td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 所属部门：</td>
<td align="left"><select name="bumen" id="bumen">
  <?
  $sql="select * from bumen order by id DESC";
 $res=mysql_query($sql);
 while($rs=mysql_fetch_array($res))
 {
	 ?>

	  <option value="<?=$rs[id]?>" <? if($rs[id]==$data[cartype]) echo "selected"; ?>><?=$rs[name]?></option>
	 <?
	 }
  ?>

  </select></td>
</tr><tr align="center" bgcolor="#F2FDFF">
<td align="right"> 生日：</td>
<td align="left"><input name="birth" type="text" id="birth" size="20" value=<?=$data[birth]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 联系电话：</td>
<td align="left"><input name="tel" type="text" id="tel" size="20" value=<?=$data[tel]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 现任职务：</td>
<td align="left"><input name="zhiwu" type="text" id="zhiwu" size="20" value=<?=$data[zhiwu]?>></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 性别：</td>
<td align="left"><select name="sex" id="sex">

	  <option value="男" >男</option>

	  <option value="女" >女</option>

  </select></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">干部照片：</td>
<td align="left"><label for="textfield"></label>
  <input type="file" name="pic" id="textfield" /></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right"> 政治面貌：</td>
<td align="left"><select name="mianmao" id="sex">
  <option value="党员" selected="selected">党员</option>
  <option value="团员">团员</option>
  <option value="群众">群众</option>
  <option value="其他党派">其他党派</option>
</select></td>
</tr>
<tr align="center" bgcolor="#F2FDFF">
<td align="right">学历：</td>
<td align="left"><select name="xueli" id="sex">
  <option value="本科" selected="selected">本科</option>
  <option value="研究生">研究生</option>
  <option value="博士">博士</option>
  <option value="大专">大专</option>
  <option value="博士后">博士后</option>
  <option value="大专以下">大专以下</option>
</select></td>
</tr>
<tr align="center" bgcolor="#ebf0f7">
          <td  colspan="2" >
		     <INPUT TYPE="hidden" name="action" value="yes">
            <input type="Submit" name="Submit" value="提交">
          	<input type="button" name="Submit2" value="返回" onClick="history.back(-1)"></td>
        </tr>
		</FORM>
      </table>