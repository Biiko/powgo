<?php
include_once("database.php");

$user_name=$_POST['user_name'];
$user_psw=$_POST['user_psw'];

//判断用户名&密码
$sql="select * from user where user_name='$user_name' and  user_psw='$user_psw'";

getConnection();

$resultSet=mysql_query($sql);

if(mysql_num_rows($resultSet)>0){
	echo "登陆成功！准备跳转！";
}else{
	echo "登陆失败，用户名或者密码输入错误，请重试。";
	
}
closeConnection();

?>