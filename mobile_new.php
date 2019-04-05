<!doctype html>
<html>
<head>
<meta name="viewport" content="user-scalable=no, width=device-width,initial-scale=1.0, maximum-scale=1.0">
<meta charset="UTF-8" />
<title>新建发布信息表单（手机版）</title>
<style type="text/css" >
body {
	background: gray;
	font-size:20px;
}
</style>
</head>
<body>
<center>
<h1 style="color:blue;font-size:32px;">发布信息界面</h1>
</center>
<?php
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
	$tfm="";
	$tfm.="发布信息编号：<input type='text' id='fnum' name='fnum' size='8' value='";
	$tfm.=date("YmdHis");
	$tfm.="' readonly/></br>";
	$tfm=$tfm."<form action='new1.php' method='post'>";
	$tfm.="发布信息类型：";
	$tfm=$tfm."<select id='ftype' name='ftype'>";
	$ftyp=$db->query("select tp,tn from mulu ");
	while($fp=$ftyp->fetchArray())
	{
		$tfm.="<option value='".$fp["tp"]."'>".$fp["tn"]."</option>"; 
	}
	$tfm.="</select><br/>";
	$tfm.=<<<FHM
	提供发布地址：<input type='text' name='fadd' id='fadd' size='15' value='' /></br>
	发布详细信息：<br/><textarea id='finf' name='finf' cols='25' rows='10'></textarea></br>
	<center>
	<p>发布者用户名：<input type='text' name='uacc' id='uacc' size='10' value='' /><br/>
	发布者的密码：<input type='password' name='upas' id='upas' size='10' value='' /></p>
	<p><input type='submit' value='填写完成后请点击此处，等待后台的处理结果' /></p></center></from>
FHM;
	echo $tfm;
?>
</body>
</html>