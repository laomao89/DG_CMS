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
		
	<ul style="width: 800px;margin: 100px auto;">
                <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(0,115,3,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<li>
			<?=$bqno?>
			<a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a>
		</li>
		<?php
}
}
?>		
	</ul>
<hr/>
	<ul style="width: 800px;margin: 100px auto;">	
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(4,'3,7',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<li>
			<?=$bqno?>
			<a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a>
		</li>
		<?php
}
}
?>		
	</ul>	
	</body>
<hr/>
	<ul style="width: 800px;margin: 100px auto;">	
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('movie',15,18,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<li>
			<?=$bqno?>
			<a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a>
		</li>
		<?php
}
}
?>		
	</ul>	
	</body>
</html>
