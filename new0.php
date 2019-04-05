<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>发布信息页面</title>
</head>
<body bgcolor="black">
<center>
<h1 style="color:blue">发布信息界面</h1>
<?php
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
	$tfm="";
	$tfm=$tfm."<form action='new1.php' method='post'>";
	$tfm=$tfm."<table bgcolor='white'>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布信息类型：</th><td>";
	$tfm=$tfm."<select id='ftype' name='ftype'>";
	$ftyp=$db->query("select tp,tn from mulu ");
	while($fp=$ftyp->fetchArray())
	{
		$tfm.="<option value='".$fp["tp"]."'>".$fp["tn"]."</option>"; 
	}
	$tfm.="</select></td><td>此处为发布信息类型，如果没有请联系管理员添加类型名称。</td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布信息编号：</th><td><input type='text' id='fnum' name='fnum' size='14' value='";
	$tfm.=date("YmdHis");
	$tfm.="' readonly/></td><td>发布信息编号由系统自动生成，信息提交完成后将被写入系统中</td></tr>";
	$tfm.=<<<FHM
	<tr bgcolor='lightgreen'><th align='right'>提供发布地址：</th><td><input type='text' name='fadd' id='fadd' size='50' value='' /></td><td>请提供发布信息的所在地址，婚姻介绍类型不需要填写如填写将不记录</td></tr>
	<tr bgcolor='lightgreen'><th align='right'>发布详细信息：</th><td><textarea id='finf' name='finf' cols='50' rows='5'></textarea></td><td>请在此发布你要发布的详细信息，最小20字，最多250字。</td></tr>
	<tr bgcolor='lightgreen'><th align='right'>发布者用户名：</th><td><input type='text' name='uacc' id='uacc' value='' /></td><td>请将管理员告知你的用户名写入此！</td></tr>
	<tr bgcolor='lightgreen'><th align='right'>发布者的密码：</th><td><input type='password' name='upas' id='upas' value='' /></td><td>请将管理员告知你的用户密码写入此！</td></tr>
	</table><p>
	<input type='submit' value='完成上述的信息填写，请单击此处。稍后将为你在系统后台判断并发布您的信息' /></p></from>
FHM;
	echo $tfm;
?>
</center>
</body>
</html>