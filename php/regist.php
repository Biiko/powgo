<?php
include_once("database.php");

if(empty($_POST)){
  exit("您提交的表单数据超过post_max_size的配置");
}

$user_psw=$_POST['user_psw'];
$user_cpsw=$_POST['user_cpsw'];

if ($user_psw!=$user_cpsw) {
  exit("两次输入不一样啊");
  // 以后塞ajax
}

$user_name=$_POST['user_name'];
$userNameSQL="select * from user where user_name='$user_name'";
getConnection();
$resultSet=mysql_query($userNameSQL);

if (mysql_num_rows($resultSet)>0) {
  closeConnection();
  exit("用户名已经被占用");
  // 以后放ajax
}

$registerSQL="insert into user values(null,'$user_name','$user_psw',0)";
mysql_query($registerSQL);
$user_ID=mysql_insert_id();
echo "注册成功<br/>";
// 放ajax

$userSQL="select * from user where user_id=$user_ID";
$userResult=mysql_query($userSQL);

if ($user=mysql_fetch_array($userResult)) {
  echo "您注册的用户名是:".$user["user_name"];
}else {
  exit("用户信息注册失败");
}

closeConnection();
?>
