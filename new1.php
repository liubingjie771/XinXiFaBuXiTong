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
if($_POST["ftype"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布信息类型：获取失败\\n请重试");
		location.href='new0.php';
	</script>
ETP;
	exit(0);
}
else
{
	$ftyp=$_POST["ftype"];
}
if($_POST["fnum"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布信息编号：获取失败\\n请重试");
		location.href='new0.php';
	</script>
ETP;
	exit(0);
}
else
{
	$fnum=$_POST["fnum"];
}
if($ftyp=="c")
{
	$fadr="";
}
elseif($_POST["fadd"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("提供发布地址：不能为空!\\n请重试");
		history.go(-1);
	</script>
ETP;
	exit(0);
}
else
{
	$fadr=$_POST["fadd"];
}
if($_POST["finf"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布详细信息：不能为空!\\n请重试");
		history.go(-1);
	</script>
ETP;
	exit(0);
}
else
{
	$finf=$_POST["finf"];
}
if(strlen($finf)<(19*3))
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布详细信息：没有达到20字!\\n请重试");
		history.go(-1);
	</script>
ETP;
	exit(0);
}
if($_POST["uacc"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布者用户名：不能为空!\\n请重试");
		history.go(-1);
	</script>
ETP;
	exit(0);
}
else
{
	$uacc=$_POST["uacc"];
}
if($_POST["upas"]=="")
{
	echo <<<ETP
	<script type="text/javascript">
		window.alert("发布者的密码：不能为空!\\n请重试");
		history.go(-1);
	</script>
ETP;
	exit(0);
}
else
{
	$upas=$_POST["upas"];
}
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
$ust="select lxu,lxp from lxrs where lxu='".$uacc."'";
$ust=$db->query($ust);
$ust=$ust->fetchArray();
$usr=$ust["lxu"];
$usp=$ust["lxp"];
if($usr=="")
{
	echo "<script>alert('发布者用户名：不正确!\\n请重试');history.go(-1);</script>";
	exit(0);
}
elseif(sha1($upas)!=$usp)
{
	echo "<script>alert('发布者的密码：不正确!\\n请重试');history.go(-1);</script>";
	exit(0);
}
$int="insert into infos values (".$fnum.",'".$ftyp."','".$fadr."',now(),'".$finf."','".$uacc."','')";
if($db->exec($int))
{
	echo "<script>alert('发布信息已经成功\\n请查看主页\\n谢谢');window.close();</script>";
}
else
{
	echo "<script>alert('发布信息写入失败！\\n请重试');history.go(-1);</script>";
}
?>
</body>
</html>