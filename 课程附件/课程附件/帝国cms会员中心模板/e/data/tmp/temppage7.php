<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><html>
	<head>
		<meta charset="utf-8" />
		<title>[!--pagetitle--]</title>
		<meta name="Keywords" content="[!--pagekeywords--]"/>
		<meta name="Description" content="[!--pagedescription--]"/>
		<style type="text/css">
				a{text-decoration: none;color: #333;}
		</style>
	</head>
	<body>	
	<!--图片友情链接-->
	 图片友情链接:<? @sys_GetSitelink(8,8,1,0,0);?>
    <hr/>
    <!--文字友情链接-->
   	 文字友情链接:<? @sys_GetSitelink(8,8,2,0,0);?>

<!--文字链接-->
	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select * from [!db.pre!]enewslink where checked=1 and lpic="" order by
	"myorder newstime ASC" desc limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	<li>
	   	<a href="<?=$bqr['lurl']?>" 
	   	title="<?=$bqr['lname']?>"><?=$bqr['lname']?></a>
		
	</li>
	<?php
}
}
?>	
	
<!--图片链接-->
	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select * from [!db.pre!]enewslink where checked=1 and lpic !="" order by
	"myorder newstime ASC" desc limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	<li>
	   	<a href="<?=$bqr['lurl']?>" 
		title="<?=$bqr['lname']?>"><img src="<?=$bqr['lpic']?>"/></a>
	</li>
	<?php
}
}
?>	
	
	
	</body>
</html>