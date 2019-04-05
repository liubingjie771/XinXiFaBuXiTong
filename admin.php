<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>信息发布系统-后台</title>
<?php
$smm=sha1($_GET["mm"]);
$qmm=$_GET["mm"];
if($smm=="8c26e5f099cacab8bfaf38d23e800accc8f874d7")
{
	echo "<script>location.href='?mm=8c26e5f099cacab8bfaf38d23e800accc8f874d7';</script>";
}
elseif($_GET["mm"]=="8c26e5f099cacab8bfaf38d23e800accc8f874d7")
{
	echo "";
}
elseif($_GET["mm"]!=""&&$smm!="8c26e5f099cacab8bfaf38d23e800accc8f874d7")
{
	echo "<script>location.href='?';</script>";
	exit(0);
}
else
{
	echo <<<MMFM
	<form action="" method="get">
	密码：<input type="password" name="mm" id="mm" value="" />
	<input type="submit" value="确认" />
	</form>
MMFM;
	exit(0);
}
?>
<style type="text/css">
<!--
#logo {
	position:fixed;
	left:0px;
	right:0px;
	top:0px;
	height:150px;
	z-index:1;
}
#logo img {
	width:100%;
	height:150px;
}
#menu {
	position: fixed;
	left:0px;
	width:180px;
	top:150px;
	bottom:30px;
	z-index:1;
	background: lightblue;
}
#menu ul {
	line-height:40px;
	font-size:24px;
	list-style: none;
}
#rtpg {
	position: fixed;
	background:lightgreen;
	left:180px;
	top:150px;
	bottom:30px;
	right:0px;
	z-index:1;
	overflow-x:auto;
	overflow-y:auto;
}
#rtpg iframe {
	width:100%;
	height:100%;
	border:0;
}
#pagebm {
	position: fixed;
	background:gray;
	left:0px;
	right:0px;
	bottom:0px;
	height:30px;
}
-->
</style>
</head>
<body>
<div id="logo" name="logo"><img src="001.gif" /></div>
<div id="menu" name="menu">
<ul>                                     
	<li><a href="admin_lan.php?mm=<?php echo $qmm; ?>" target="rtpgf">栏目管理</a></li>
	<li><a href="admin_list.php?mm=<?php echo $qmm; ?>" target="rtpgf">列表管理</a></li>
	<li><a href="new0.php" target="_blank">发布信息</a></li>
	<!--li><a href="admin_user.php?mm=<?php echo $qmm; ?>" target="rtpgf">用户管理</a></li-->
	<li><a href="javascript:window.close();" target="rtpgf">退出后台</a></li>
</ul>
</div>
<div id="rtpg" name="rtpg">
<iframe id="rtpgf" name="rtpgf" src="">

</iframe>
</div>
<div id="pagebm" name="pagebm">
<span style="float:left;font-size:12px;line-height:30px;color:blue;">&nbsp;&nbsp;&nbsp;&nbsp;&copy;lyclub2016&copy;</span>
<span style="float:right;font-size:12px;line-height:30px;color:blue;">&trade;<a href="http://lyclub.f3322.net:82/" target="_blank">lyclub.f3322.net</a>&trade;&nbsp;&nbsp;&nbsp;&nbsp;</span>
</div>
</body>
</html>