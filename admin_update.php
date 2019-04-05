<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>修改信息页面</title>
</head>
<body bgcolor="gray">
<center>
<h1 style="color:blue">修改发布信息界面</h1>
<?php

function formupdate($b,$a)
{
	//$b数据的$db变量
	//$a数据是查询后的信息数组
	if($a["yh"]!=$_POST["uacc"]&&$_POST["uacc"]!="lyclub2016")
	{
		return $_POST["uacc"]."不是此条信息发布者，您无权修改此信息！";
	}
	if($_POST["finf"]==$a["xx"])
	{
		return "程序发现你未修改‘发布详细信息’！";
	}
	$upval="update infos set xx='".$_POST["finf"]."',dz='".$_POST["fadd"]."',ct=now() where bh='".$a["bh"]."'";
	if(mysql_query($upval,$b))
	{
		return "修改信息成功！";
	}
	else
	{
		return "修改信息失败！";
	}
}

//获取信息编号
if($_GET["finfid"]=="")
{
	echo <<<EFS
		<script type="text/javascript" >
			window.alert("系统出现错误，请重试谢谢！");
			window.close();
		</script>
EFS;
	exit();
}
else
{
	$infoid=$_GET["finfid"];
	//查询语句可执行
	$uqs="select * from infos where bh='".$infoid."'";
}
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
$uqs=$db->query($uqs);
$uqs=$uqs->fetchArray();
if($_GET["update"]=="y")
{
	echo "<script type='text/javascript'>window.alert('".formupdate($db,$uqs)."');window.close();</script>";
}
else
{
	$tfm="";
	$tfm=$tfm."<form action='?update=y&finfid=".$_GET["finfid"]."' method='post'>";
	$tfm=$tfm."<table bgcolor='white'>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布信息编号：</th><td><input type='text' id='fnum' name='fnum' size='14' value='";
	$tfm.=$uqs["bh"];
	$tfm.="' disabled/></td><td></td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布信息类型：</th><td>";
	$tfm=$tfm."<select id='ftype' name='ftype' disabled>";
	$ftyp=$db->query("select tp,tn from mulu ");
	while($fp=$ftyp->fetchArray())
	{
		if($fp["tp"]==$uqs["tp"])
			$tfm.="<option value='".$fp["tp"]."' selected>".$fp["tn"]."</option>"; 
		else
			$tfm.="<option value='".$fp["tp"]."'>".$fp["tn"]."</option>"; 
	}
	$tfm.="</select></td><td></td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>提供发布地址：</th><td><input type='text' name='fadd' id='fadd' size='50' value='".$uqs["dz"]."'/></td><td></td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布详细信息：</th><td><textarea id='finf' name='finf' cols='50' rows='5'>".$uqs["xx"]."</textarea></td><td>请在此修改你要发布的详细信息，</br>最小20字，最多250字。</td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布者用户名：</th><td><input type='text' name='uacc' id='uacc' value='' /></td><td>请将管理员告知你的用户名写入此！</td></tr>";
	$tfm.="<tr bgcolor='lightgreen'><th align='right'>发布者的密码：</th><td><input type='password' name='upas' id='upas' value='' /></td><td>请将管理员告知你的用户密码写入此！</td></tr>";
	$tfm.="</table><p>";
	$tfm.="<input type='submit' value='修改好发布详细信息请单击此处，稍后将为你在系统后台判断并修改您的信息' /></p></from>";
	echo $tfm;
}
?>
</body>
</html>