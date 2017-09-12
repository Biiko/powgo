<?php
$databaseConnection=null;
function getConnection(){
	$hostname="localhost";	//数据库服务器主机名
	$database="muko01";		//数据库名
	$userName="root";		//数据库服务器用户名
	$password="hzppqq";		//数据库服务器密码

	global $databaseConnection;

	$databaseConnection = @mysql_connect($hostname,$userName,$password)or die(mysql_error());	//连接数据库服务器
	mysql_select_db("set names 'utf8'");	//设置字符集
	@mysql_select_db($database,$databaseConnection)or die (mysql_error());	
}

function closeConnection(){
	global $databaseConnection;
	if ($databaseConnection) {
		mysql_close($databaseConnection)or die(mysql_error());
	}
}


?>