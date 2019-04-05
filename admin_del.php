<meta charset="UTF-8" />
<?php
if($_GET['finfid']!="")
{
	echo "<form action='?' method='post'>";
	echo "<input type='hidden' id='delid' name='delid' value='".$_GET['finfid']."'/>";
	echo "<p>用户账号名：<input type='text' id='uu' name='uu' value='' /></p>";
	echo "<p>用户的密码：<input type='password' id='mm' name='mm' value='' /></p>";
	echo "<p><input type='submit' value='登录并删除' /></p>";
	echo "</form>";
}
else
{
	date_default_timezone_set('UTC');
	//数据库操作信息
	include("../data/sqlite3.php");
	$db=new DataBase("sqlite3db/xxinfo.db");
	ini_set('display_errors',0);            //错误信息1
	ini_set('display_startup_errors',0);    //php启动错误信息1
	error_reporting(0);                    //打印出所有的 错误信息-1
	$fur=$db->query("select yh from infos where bh='".$_POST['delid']."'");
	$fur=$fur->fetchArray();
	$sur="select lxu,lxp from lxrs where lxu='".$fur["yh"]."' and lxp='".sha1($_POST["mm"])."'";
	$sur=$db->query($sur);
	$sur=$sur->fetchArray();
	$usr=$sur["lxu"];
	$usp=$sur["lxp"];
	if($usr=="lyclub2016")
	{
		if($db->query("delete from infos where bh='".$_POST['delid']."'"))
		{
			echo "<script>alert('记录删除成功！');window.close();</script>";
		}
		else	
		{
			echo "<script>alert('记录删除失败！');window.close();</script>";
		}
	}
	elseif($usr==$_POST["uu"]&&$usp!="")
	{
		if($db->query("delete from infos where bh='".$_POST['delid']."' and yh='".$usr."'"))
		{
			echo "<script>alert('记录删除成功！');window.close();</script>";
		}
		else	
		{
			echo "<script>alert('记录删除失败！');window.close();</script>";
		}
	}
	else
	{
		echo "<script>alert(' $usr 记录无法删除 $usp ，请确认用户信息是否正确！');history.go(-1);</script>";
	}
}
?>