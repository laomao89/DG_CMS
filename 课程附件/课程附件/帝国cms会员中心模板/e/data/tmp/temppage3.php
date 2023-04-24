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
			a{
				color: black;
			}
		</style>
	</head>
	<body>
		<ul style="width: 800px;margin: 100px auto;">
			<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,11,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
				<li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>">
					<?=esub($bqr['title']y)?></a></li>
				<!--<a href="<?=$bqsr['titleurl']?>" target="_blank"><?=$bqr['title']?></a> <br>-->
			<?php
}
}
?>
		</ul>
	</body>
</html>
</html>






