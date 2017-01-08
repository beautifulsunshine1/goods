<?php
$id=$_GET['id'];//获取需要删除的商品的编号
mysql_connect('localhost','root','');//连接数据库。
mysql_select_db('data');//选择数据库。
mysql_query('set names uft8');//设置字符编码.
//执行铲除功能的SQL语句
$rs="delete from goods where goodsid=$id";
if(mysql_query($rs))//数据操作语句(delete、update等）返回结果：正确返回true，错误返回false.数据查询语句（select、show等）返回的结果：正确返回一个资源。错误返回false。
{
   header('location:admin.php');
}else
{
  die(mysql_error());
}
?>
