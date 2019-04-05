<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>分类组管理</title>
</head>
<body>
<?php
date_default_timezone_set('UTC');
//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
$st="select * from mulu";
$sn="select count(*) from mulu";
$sn=$db->query($sn);
$sn=$sn->fetchArray();
$sn=$sn[0];
//获取到了记录数
//echo $sn;
//每页显示两条
//$st=$st." LIMIT 0,2";
$sd=$db->query($st);
echo "<table bgcolor='black' cellspace='0' cellpadding='0' width='90%'>";
echo <<<tbT
<tr bgcolor='lightblue'>
	<th>栏目标题</th>
	<th>创建用户</th>
	<th>创建时间</th>
	<th>栏目标注</th>
</tr>
tbT;
while($dr=$sd->fetchArray())
{
	echo "<tr bgcolor='white'>";
	for($i=1;$i<(count($dr)/2);$i++)
		echo "<th width='20%'>".$dr[$i]."</th>";
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>