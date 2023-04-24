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
	<? @sys_ShowClassByTemp('0',12,0,0);?>
	<ul style="width: 800px;margin: 100px auto;">	
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select classpath,classname from [!db.pre!]enewsclass where bclassid=0 and classid!=6 order by
		"classid newstime ASC" desc limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<li>
			<a href="<?=$public_r[newsurl]?><?=$bqr['classpath']?>" 
			title="<?=$bqr['classname']?>"><?=$bqr['classname']?></a>
		</li>
		<?php
}
}
?>		
	</ul>
	
	</body>
</html>

