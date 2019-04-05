<!doctype html>
<html>
<head>
<meta name="viewport" content="user-scalable=no">
<title>信息发布系统(手机版)</title>
<meta charset="UTF-8" />
<base target="info" />
<style style="text/css">
<!--
body,button,table,td,th {
	font-size:28px;
}
#logo {
	position:fixed;
	left:0px;
	right:0px;
	top:0px;
	background:black;
	width:100%;
}
#main {
	position: fixed;
	left:0px;
	right:0px;
	bottom:0px;
	background:gray;
	overflow-x: none;
	overflow-y: scroll;
	height:70%;
	width:100%;
	border:0px;
}
-->
</style>
</head>
<body>
<center>
<img id="logo" name="logo" src="002.gif" />
<div  id="main" name="main" >
<p><button style='float:left;background:orange;border:0px;'><a href="tel://15589570688">客服(王先生)电话</a></button><button style="background:orange;float:right;color:blue;border:0px;">&nbsp;&nbsp;<a href="mobile_new.php" target="_blank" >发布信息</a>&nbsp;&nbsp;</button></p>
<p>
	<span style="background:white;color:blue;font-size:36px;float:center;">信息分类浏览：&nbsp;<a href='main.php?type=&fontsize=36' >所有信息</a>&nbsp;<br/>
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
	echo "<a href='main.php?type=".$mr["tp"]."&fontsize=36'>".$mr["tn"]."</a>&nbsp;";
}
?>
</span>
</p>
<iframe  id="info" name="info" src="main.php?fontsize=36" width="100%" height="100%" border=0></iframe>
</div>
</center>
</body>
</html>
