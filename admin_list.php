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
$st="select infos.bh,mulu.tn,infos.dz,infos.ct,infos.xx,infos.yh,infos.bk from infos,mulu where infos.tp=mulu.tp order by ct desc";
$sn="select count(*) from infos,mulu where infos.tp=mulu.tp";
$sn=$db->query($sn);
$sn=$sn->fetchArray();
$sn=$sn[0];
//获取到的记录数
//echo $sn;
//限制每页显示五条数据
//$st=$st." LIMIT 0,5";
$sd=$db->query($st);
echo "<table bgcolor='black' cellspace='0' cellpadding='0' width='90%'>";
echo <<<tbT
<tr bgcolor='lightblue'>
	<th>栏目类型</th>
	<th>地址信息</th>
	<th>发布时间</th>
	<th>发布说明</th>
	<th>发布用户</th>
	<th>信息操作</th>
</tr>
tbT;
while($dr=$sd->fetchArray())
{
	echo "<tr bgcolor='white'>";
	for($i=1;$i<((count($dr)/2)-1);$i++)
	{
		echo "<th width='10%'>".nl2br($dr[$i])."</th>";
	}
	echo "<th width='10%'><a href='admin_del.php?finfid=".$dr[0]."' target='_blank'>删除</a>&nbsp;<a href='admin_update.php?finfid=".$dr[0]."' target='_blank'>编辑</a></th>";
	echo "</tr>";
}
echo "</table>";
?>
</body>
</html>