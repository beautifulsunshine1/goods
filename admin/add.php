<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加商品</title>
<style type="text/css">
table,th,td{border:1px solid #000; }
table{
      width:500px;
      
	  font-size:14px;
	  }

</style>
<script type="text/javascript">
  function check()
  {
    //商品名验证
    var goodsname=document.getElementById('goodsname')
    if(goodsname.value=='')
	{
	  alert('商品名不能为空');
	  goodsname.focus();//获得焦点
	  return false;
	}
	//商品规格验证
	var goodsguige=document.getElementById('goodsguige');
	 if(goodsguige.value=='')
	{
	  alert('商品规格不能为空');
	  goodsguige.focus();//获得焦点
	  return false;
	}
	//商品价格验证
	var goodsprice=document.getElementById('goodsprice');
	 if(goodsprice.value==''||isNaN(goodsprice.value))
	{
	  alert('商品价格必须为数字');
	  goodsprice.select();//选中
	  return false;
	}
	//验证商品储量
	var goodsstore=document.getElementById('goodsstore');
	if(goodsstore.value==''||isNaN(goodsstore.value)||goodsstore.value.indexOf('.')!=-1)
	{
	  alert('商品储量必须为整数');
	  goodsstore.select();//选中
	  return false;
	}
  }
</script>
</head>

<body>
<?php
     if(isset($_POST['button']))
	 {
	   $goodsname=$_POST['goodsname'];
	   $goodsguige=$_POST['goodsguige'];
	   $goodsprice=$_POST['goodsprice'];
	   $goodsstore=$_POST['goodsstore'];
	   @mysql_connect('localhost','root','')or die(mysql_error());
	   mysql_select_db('data');
	   mysql_query('set names utf8');
	   $sql="insert into goods values(null,'$goodsname','$goodsguige', $goodsprice, $goodsstore)";
	  if(mysql_query($sql))
	  {
	    header('location:admin.php');
	  }else
	  {
	    echo '添加失败';
	  }
	   
	   
	 }
?>
   <form name="form1" method="post" action="" onsubmit="return check()">
     <table width="250" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th colspan=2>添加商品</td>
  </tr>
  <tr>
    <td>商品名</td>
    <td><input type="text" name="goodsname" id="goodsname" /></td>
  </tr>
  <tr>
    <td>商品规格</td>
    <td><input type="text" name="goodsguige" id="goodsguige"/></td>
  </tr>
  <tr>
    <td>商品价格</td>
    <td><input tye="text" name="goodsprice" id="goodsprice" /></td>
  </tr>
  <tr>
    <td>商品储量</td>
    <td><input type="text" name="goodsstore" id="goodsstore" /></td>
  </tr>
  <tr align="center">
    <td colspan=2><input type="submit" name="button" value="提交" /><input type="button" name="button1" value="返回" onclick="location.href='admin.php'" /></td>
  </tr>
</table>

   </form>
</body>
</html>
