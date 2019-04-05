<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>创建系统初始化数据</title>
<?php
//创建分类栏目数据表
$table[0]=<<<TB1
create table mulu (
	tp char not null unique,
	tn varchar(100) not null,
	tz varchar(100) not null,
	tm datetime not null,
	bk varchar(1000)
)
TB1;
$drop[0]="drop table mulu ";
$insert[0]=<<<IT1
	insert into mulu values (
		'a',
		'房屋买卖信息',
		'lyclub2016',
		'2018-12-12 20:10:11',
		''
	),(
		'b',
		'房屋租凭信息',
		'lyclub2016',
		'2018-12-12 20:15:11',
		''
	),(
		'c',
		'婚姻介绍信息',
		'lyclub2016',
		'2018-12-12 20:20:11',
		''
	),(
		'd',
		'保姆找招信息',
		'lyclub2016',
		'2018-12-12 20:30:11',
		''
	)
IT1;
//创建发布信息数据表
$table[1]=<<<TB2
create table infos (
	bh bigint(14) not null unique,
	tp char not null,
	dz	varchar(200),
	ct datetime not null,
	xx varchar(1000) not null,
	yh varchar(100) not null,
	bk varchar(1000)
)
TB2;
$drop[1]="drop table infos";
$insert[1]=<<<IT2
insert into infos values (
		20180414173303,
		'a',
		'假消息：龙口市松韵苑QQ公寓B座1002',
		'2018-04-14 17:33:03',
		'假消息：\n总面积：55平方米，实际面积：45平方米；\n家具精装、含有半年联通宽带\n价格面议',
		'lyclub2016',
		''
	),(
		20180413173403,
		'b',
		'假消息：龙口市松韵苑QQ公寓A座402',
		'2018-04-13 17:34:03',
		'假消息：\n家具精装、含有半年联通宽带；\n三室一厅，适合群租；\n价格面议',
		'lyclub2016',
		''
	),(
		20180412173503,
		'c',
		'',
		'2018-04-12 17:35:03',
		'假消息：\n本人男住在松韵苑，年龄在29岁，家里有房\n找一个比我小的女孩，性格温柔体贴等',
		'lyclub2016',
		''
	),(
		20180416050301,
		'b',
		'假消息：XXX小区X号XXX单元XXX室',
		'2018-04-16 05:03:01',
		'假消息：\n因为房主外出工作，房屋出租；\n三室一厅一书房；\n家内还有一年半的联通宽带；\n房屋精装保持原样不得修改；\n每年15000元；',
		'lyclub2016',
		''
	),(
		20180418102321,
		'd',
		'假消息：龙口市百盈小区',
		'2018-04-18 10:23:21',
		'假消息：\n家内有老人，84岁不能自己行走，身高一米八，体重80公斤；\n需要健壮的保姆会做饭，一天八小时的照顾。',
		'lyclub2016',
		''
	)
IT2;
//创建用户或发布者信息数据表
$table[2]=<<<TB3
create table lxrs (
	lxr varchar(100) not null,
	xls varchar(20) not null,
	lxt varchar(20) not null,
	lxu varchar(100) not null,
	lxp varchar(100) not null,
	bak varchar(1000))
TB3;
$drop[2]="drop table lxrs";
$insert[2]=<<<IT3
insert into lxrs values(
	'刘炳杰',
	'370681198910210033',
	'18562221224',
	'lyclub2016',
	'8c26e5f099cacab8bfaf38d23e800accc8f874d7',
	''
)
IT3;

//数据库操作信息
include("../data/sqlite3.php");
$db=new DataBase("sqlite3db/xxinfo.db");
ini_set('display_errors',0);            //错误信息1
ini_set('display_startup_errors',0);    //php启动错误信息1
error_reporting(0);                    //打印出所有的 错误信息-1
for($i=0;$i<count($drop);$i++)
{
	echo "<p>";
	echo $drop[$i];
	if($db->exec($drop[$i]))
	{
		echo "成功";
	}
	else
	{
		echo "失败";
	}
	echo "</p>";
}
for($i=0;$i<count($table);$i++)
{
	echo "<p>";
	echo $table[$i];
	if($db->exec($table[$i]))
	{
		echo "成功";
	}
	else
	{
		echo "失败";
	}
	echo "</p>";
}
for($i=0;$i<count($insert);$i++)
{
	echo "<p>";
	echo $insert[$i];
	if($db->exec($insert[$i]))
	{
		echo "成功";
	}
	else
	{
		echo "失败";
	}
	echo "</p>";
}
?>