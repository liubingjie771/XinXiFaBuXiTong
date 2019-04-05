<!doctype html>
<html>
<head>
<title>信息站</title>
<meta charset="UTF-8" />
<style type="text/css">
<!--
table {
	width:95%;
	background:lightyellow;
	border:5px double green;
}
td{
	font-size:<?php echo $_GET["fontsize"]; ?>px;
	word-wrap:break-word;
	word-break:break-all;
	cellpadding:0px;
	cellspacing:0px;
	border:0px;
}
th
{
	font-size:<?php echo ($_GET["fontsize"]/3*2); ?>px;
}
-->
</style>
</head>
<body>
<center>
<?php
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
$is="select infos.ct as ct,infos.dz as dz,infos.xx as xx,mulu.tn as tn from infos,mulu where infos.tp=mulu.tp";
$im="select count(*) from infos,mulu where infos.tp=mulu.tp";
if($_GET["type"]!="")
{
	$is=$is." and infos.tp='".$_GET["type"]."'";
	$im=$im." and infos.tp='".$_GET["type"]."'";
}
//显示页面数量的值
$onum=3;
if($_GET["page"]!="")
	$is=$is." limit ".($_GET["page"]*$onum).",".$onum;
else
	$is=$is." order by ct desc limit 0,".$onum;
$ilist=$db->query($is);
while($ir=$ilist->fetchArray())
{
	echo "<table><tr bgcolor='lightblue'><th>".$ir["tn"]."</th><th>发布时间：".substr($ir["ct"],0,10)."&nbsp;<font color='gray'>".substr($ir["ct"],11,strlen($ir["ct"]))."</font></th><th>".$ir["dz"]."</th></tr>";
	echo "<tr><td colspan='3'>".nl2br($ir["xx"])."</td></tr>";
	echo "</table>";
	echo "<p></p>";
}
$lnum=$db->query($im);
$lnum=$lnum->fetchArray();
$lnum=$lnum[0];
	echo "<p>";
if($onum<$lnum)
{
	$j=0;
	$i=0;
	if($_GET["page"]=="0"||$_GET["page"]=="")
	{
		echo "&nbsp;<button>首页</button>&nbsp;";
		echo "&nbsp;<button>上一页</button>&nbsp;";
	}
	else
	{
		echo "&nbsp;<button><a href='?".$_SERVER["QUERY_STRING"]."&page=0'>首页</a></button>&nbsp;";
		echo "&nbsp;<button><a href='?".$_SERVER["QUERY_STRING"]."&page=".($_GET["page"]-1)."'>上一页</a></button>&nbsp;";
	}
	while($i<$lnum)
	{
		if($_GET["page"]!=$j)
			echo "&nbsp;<button><a href='?".$_SERVER["QUERY_STRING"]."&page=".$j."'>".($j+1)."</a></button>&nbsp;";
		else
			echo "&nbsp;<button>".($j+1)."</button>&nbsp;";
		$i+=$onum;
		$j+=1;
	}
	if($_GET["page"]==($j-1))
	{
		echo "&nbsp;<button>下一页</button>&nbsp;";
		echo "&nbsp;<button>尾页</button>&nbsp;";
	}
	else
	{
		echo "&nbsp;<button><a href='?".$_SERVER["QUERY_STRING"]."&page=".($_GET["page"]+1)."'>下一页</a></button>&nbsp;";
		echo "&nbsp;<button><a href='?".$_SERVER["QUERY_STRING"]."&page=".($j-1)."'>尾页</a></button>&nbsp;";
	}
}
	echo "<span style='float:right;color:yellow;font-size:".$_GET["fontsize"]."px;font-weight:blod;border:2px;'>共".$lnum."条信息&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>";
	echo "</p>";
?>
</center>
</body>
</html>
