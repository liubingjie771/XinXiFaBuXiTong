<!doctype html>
<html>
<head>
<title>信息发布系统(PC版)</title>
<meta charset="UTF-8" />
<base target="info" />
<style style="text/css">
<!--
#main {
	position: fixed;
	left:0px;
	right:0px;
	top:0px;
	bottom:0px;
	overflow-x: none;
	overflow-y: auto;
	background:black;
}
#logo {
	position:static;
	left:0px;
	right:0px;
	background:black;
	width:100%;
}
#info {
	position: static;
	width:100%;
	height:72%;
	background:gray;
	border:0px;
	overflow-x:none;
	overflow-y:auto;
}
#per {
	position:fixed;
	z-index:99;
	bottom:5px;
	left:5px;
	width:40px;
	line-height:20px;
	font-size:16px;
	border:1px solid gray;
}
th,td {
	word-wrap:break-word;
	word-break:break-all;
	font-size:28px;
}
-->
</style>
<center>
  <div id="main" name="main"> <img id="logo" name="logo" src="001.gif" height="120px"/>
      <p align="left"><span style="background:white;float:left;color:blue;">&nbsp;&nbsp;信息分类浏览：&nbsp;&nbsp;&nbsp;&nbsp;<a href='main.php?type=&fontsize=24' >所有发布信息</a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	date_default_timezone_set('UTC');
	//数据库操作信息
	include("../data/sqlite3.php");
	$db=new DataBase("sqlite3db/xxinfo.db");
	ini_set('display_errors',0);            //错误信息1
	ini_set('display_startup_errors',0);    //php启动错误信息1
	error_reporting(0);                    //打印出所有的 错误信息-1
	$mlist=$db->query("select tp,tn from mulu ");
	while($mr=$mlist->fetchArray())
	{
		echo "<a href='main.php?type=".$mr["tp"]."&fontsize=24'>".$mr["tn"]."</a>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp";
	}
?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="javascript:alert('联系人：王先生\n联系电话：15589570688')">联系客服</button> <span style="background:white;float:right;color:blue;">&nbsp;&nbsp;<a href="new0.php" target="_blank" >发布信息</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="admin.php" target="_blank" >管理信息</a>&nbsp;&nbsp;</span></p> 
 <iframe id="info" name="info" src="main.php?fontsize=24" /> 
  </div>
 
</center>
</body>
</html>
