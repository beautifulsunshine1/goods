<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
table,th,td{border:1px solid #000; }
table{
      width:500px;
      
	  font-size:14px;
	  }

</style>

</head>

<body>
<?php
 $id= $_GET['id'];//获取需要修改商品的编号
 @mysql_connect('localhost','root','')or die(mysql_error());//mysql_error()显示错误信息.
 mysql_select_db('data');//选择数据库.
 mysql_query('set names utf8');//设置客户端字符编码
 if(isset($_POST['button']))
 {
       $goodsname=$_POST['goodsname'];
	   $goodsguige=$_POST['goodsguige'];
	   $goodsprice=$_POST['goodsprice'];
	   $goodsstore=$_POST['goodsstore'];
	   $sql="update goods set goodsname='$goodsname',goodsguige='$goodsguige',goodsprice='$goodsprice',goodsstore='$goodsstore' where goodsid=$id";
	     if(mysql_query($sql))
		 {
		   header('location:admin.php');
		 }else
		 {
		  echo '修改失败';
		 }
	   
 }
 $sql="select * from goods where goodsid='$id'";
 $rs=mysql_query($sql);
 $rows=mysql_fetch_assoc($rs);
?>
 <form name="form1" method="post" action="" onsubmit="return check()">
     <table width="250" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan=2>修改商品</td>
  </tr>
  <tr>
    <td>商品名</td>
    <td><input type="text" name="goodsname" id="goodsname" value="<?php echo $rows['goodsname']?>" /></td>
  </tr>
  <tr>
    <td>商品规格</td>
    <td><input type="text" name="goodsguige" id="goodsguige" value="<?php echo $rows['goodsguige']?>" /></td>
  </tr>
  <tr>
    <td>商品价格</td>
    <td><input tye="text" name="goodsprice" id="goodsprice" value="<?php echo $rows['goodsprice']?>" /></td>
  </tr>
  <tr>
    <td>商品储量</td>
    <td><input type="text" name="goodsstore" id="goodsstore" value="<?php echo $rows['goodsstore']?>" /></td>
  </tr>
  <tr align="center">
    <td colspan=2><input type="submit" name="button" value="修改" /><input type="button" name="button1" value="返回" onclick="location.href='admin.php'" /></td>
  </tr>
</table>

   </form>
</body>
</html>
