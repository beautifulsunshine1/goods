<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理商品页面</title>
<style type="text/css">
table,th,td{border:1px solid #000; }
table{
      width:900px;
      margin:0px auto;
	  font-size:14px;
	  }

</style>
<script type="text/javascript">
 function jump(id)
 {
   if(confirm("确定要删除吗？"))
   {
     location.href="del.php?id="+id;
   }
 }
</script>
</head>

<body>

<?php
   @mysql_connect('localhost','root','')or die(mysql_error());//连接数据库
   mysql_select_db('data');//选择数据库
   mysql_query('set names utf8');//设置页面字符集编码
   $rs=mysql_query('select * from goods');//查询所有商品
 
   
?>
<a href="add.php">添加商品</a>
<table cellpadding="0" cellspacing="0" rules="all"> 
 <tr>
   <th>商品编号</th>
   <th>商品名</th>
   <th>商品规格</th>
   <th>商品价格</th>
   <th>商品储量</th>
   <th>修改</th>
   <th>删除</th>
 </tr>
<?php
  while($rows=mysql_fetch_assoc($rs))
   {
     echo '<tr align="center">';
	 echo '<td>'.$rows['goodsid'].'</td>';
	 echo '<td>'.$rows['goodsname'].'</td>';
	 echo '<td>'.$rows['goodsguige'].'</td>';
	 echo '<td>'.$rows['goodsprice'].'</td>';
	 echo '<td>'.$rows['goodsstore'].'</td>';
	 echo '<td><input type="button" value="修改" onclick="location.href=\'modify.php?id='.$rows['goodsid'].'\'"/></td>';
	 echo '<td><input type="button" value="删除" onclick="jump('.$rows['goodsid'].')"/></td>';
	 echo '</tr>';
   }
?>
</table>
</body>
</html>
