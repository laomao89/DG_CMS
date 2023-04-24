<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<html>
	
<head>
<meta charset="utf-8" />
<title>帝国CMS学习测试网</title>
<meta name="keywords" content="帝国CMS学习测试网管理系统" />
<meta name="description" content="　　帝国CMS学习测试网是一家专注于网络软件开发的科技公司，其主营产品“帝国网站管理系统“。" />
<link href="/skin/default/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/skin/default/css/swiper.min.css"/>
<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
</head>

<body class="homepage">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%"> 
<!-- 登录 -->
<script src="/e/member/login/loginjs.php"></script>
</td>
<td align="right">
<a onclick="window.external.addFavorite(location.href,document.title)" href="#ecms">加入收藏</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('/')" href="#ecms">设为首页</a> | <a href="/e/member/cp/">会员中心</a> | <a href="/e/DoInfo/">我要投稿</a> | <a href="/e/web/?type=rss2&classid=0" target="_blank">RSS<img src="/skin/default/images/rss.gif" border="0" hspace="2" /></a>
</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="10">
<tr valign="middle">
<td width="240" align="center"><a href="/"><img src="/skin/default/images/logo.gif" width="200" height="65" border="0" /></a></td>
<td align="center"><a href="http://www.phome.net/OpenSource/" target="_blank"><img src="/skin/default/images/opensource.gif" width="100%" height="70" border="0" /></a></td>
</tr>
</table>
<!-- 导航tab选项卡 -->
<table width="920" border="0" align="center" cellpadding="0" cellspacing="0" class="nav">
  <tr> 
    <td class="nav_global"><ul>
        <li class="curr" id="tabnav_btn_0" onmouseover="tabit(this)"><a href="/">首页</a></li>
        <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select classpath,classname from [!db.pre!]enewsclass where bclassid=0 and classid !=6 order by classid limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
            <li id="tabnav_btn_<?=$bqno?>" onmouseover="tabit(this)"><a href="<?=$public_r[newsurl]?><?=$bqr['classpath']?>"><?=$bqr['classname']?></a></li>
        <?php
}
}
?>
    </ul></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>最后更新</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,11,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	<li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],26)?></a></li>
<?php
}
}
?>	
</ul>

<table width="94%" border="0" align="center" cellpadding="0" cellspacing="6" class="picText">
<tr valign="top">
	
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,1,0,1,'isgood=1 and firsttitle=1');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<td><a href="<?=$bqsr['titleurl']?>" target="_blank"><img width="70" height="78" src="<?=$bqr['titlepic']?>" alt="<?=$bqr['title']?>" /></a></td>
<td><strong><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],18)?></a></strong><?=esub($bqr['smalltext'],60)?></td>
<?php
}
}
?>	

</tr>
</table>
</td>
</tr>
</table></td>
<td class="content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td>
    <!-- 焦点图片，调用默认模型带标题图片的头条信息 -->
		<!--swiper页面结构-->
		<div class="swiper-container" style="width: 450px;height: 255px;">
		    <div class="swiper-wrapper">		    	
		        <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,3,12,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		        <div class="sw7iper-slide">
		        	<a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="450" height="255"/></a>
		        </div>
		        <?php
}
}
?>		       
		    </div>		
		</div>		
		<script src="/skin/default/js/swiper.min.js"></script>
		<script> 
			
			//初始化一个Swiper实例    new Swiper(swiper容器, 个性化配置)
		  var mySwiper = new Swiper ('.swiper-container', {
				loop:true,//开启环路，会在项目前后复制各一个,让Swiper看起来是循环的,默认为false
			  	autoplay:true,
		  })        
		</script>
 </td>
</tr>
</table>
<!-- 头条信息调用 -->
<table width="100%" border="0" cellspacing="8" cellpadding="0" class="focus">
<tr>
<td>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,1,12,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<strong><a href="<?=$bqsr['titleurl']?>"><?=esub($bqr['title'],40)?></a></strong>
<p><?=esub($bqr['smalltext'],160)?></p>
<?php
}
}
?>	
</td>
</tr>
<tr>
<td align="center">
	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,'1,2',12,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	<a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>">·<?=esub($bqr['title'],28)?></a>
	<?php
}
}
?>	
</td>
</tr>
</table></td>
<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>推荐资讯</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box no_doc">
<tr>
<td><ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,5,2,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<li><p><strong><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],28)?></a></strong><?=esub($bqr['smalltext'],60)?> </p></li>
<?php
}
}
?>
</ul></td>
</tr>
</table></td>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td align="center" class="banner_ad"><a href="http://www.phome.net/ebak2008/" target="_blank" title="马上免费下载"><img src="/skin/default/images/empirebak.gif" width="920" height="90" border="0" /></a></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td width="230" class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong><a href="/info/">分类信息</a></strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(9,10,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],28)?></a></li>
<?php
}
}
?>	
</ul></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong><a href="/download/">下载更新</a></strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box no_doc">
<tr>
<td><ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(3,4,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
     <li><p><strong><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],28)?></a></strong><?=esub($bqr['softsay'],68)?></p></li>
  <?php
}
}
?>	   
</ul></td>
</tr>
</table></td>
<td class="content"><!-- tab选项卡，默认为点击变化，如需改为移动，将onmouseover改为onclick -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbtn1">
<tr>
<td class="tbtncon"><ul><li class="curr" id="tab1_btn_0" onmouseover="etabit(this)">新闻</li><li id="tab1_btn_1" onmouseover="etabit(this)">图片</li></ul></td>
</tr>
<tr>
<td class="picList"><div id="tab1_div_0"> <table width=100% border=0 cellpadding=3 cellspacing=0>
	<tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,3,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<td align=center><a href='<?=$bqsr['titleurl']?>' target=_blank><img src='<?=$bqr['titlepic']?>' width='128' height='90' border=0 alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=esub($bqr['title'],20)?></span></a></td>
		<?php
}
}
?>
	</tr>
	<tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,'3,3',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<td align=center><a href='<?=$bqsr['titleurl']?>' target=_blank><img src='<?=$bqr['titlepic']?>' width='128' height='90' border=0 alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=esub($bqr['title'],20)?></span></a></td>
		<?php
}
}
?>	
	</tr>
	</table> 
            </div>
            <div id="tab1_div_1" style="display:none;"> <table width=100% border=0 cellpadding=3 cellspacing=0>
            	<tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,3,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<td align=center><a href='<?=$bqsr['titleurl']?>' target=_blank><img src='<?=$bqr['titlepic']?>' width='128' height='90' border=0 alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=esub($bqr['title'],20)?></span></a></td>
		<?php
}
}
?>
            	</tr>	
            	<tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,'3,3',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		<td align=center><a href='<?=$bqsr['titleurl']?>' target=_blank><img src='<?=$bqr['titlepic']?>' width='128' height='90' border=0 alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=esub($bqr['title'],20)?></span></a></td>
		<?php
}
}
?>	
            	</tr></table> 
            </div>
</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>精彩专题</strong></td>
</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="box">
<tr valign="top">
<td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="news_title">
<tr>
    <td>
    	<!--国内一级推荐-->
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(34,1,0,0,'isgood=1');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  	
<strong><a href="<?=$bqsr['titleurl']?>"><?=esub($bqr['title'],20)?></a></strong>
<p><?=esub($bqr['smalltext'],140)?></p>
<?php
}
}
?> 
 	</td>
</tr>
</table>
<ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(34,7,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  	
    <li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],28)?></a></li>
<?php
}
}
?>     
            </ul></td>
<td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="news_title">
<tr>
    <td>
    <!--国级一级推荐-->	
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(35,1,0,0,'isgood=1');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  	
<strong><a href="<?=$bqsr['titleurl']?>"><?=esub($bqr['title'],20)?></a></strong>
<p><?=esub($bqr['smalltext'],140)?></p>
<?php
}
}
?> 
</td>
</tr>
</table>
<ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(35,7,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  	
    <li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],26)?></a></li>
<?php
}
}
?>  
            </ul></td>
</tr>
</table></td>
<td width="240" class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
<tr>
<td><strong>热门点击</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ol class="rank">
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,10,1,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>	
<li class="no<?=$bqno?>"><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a></li>
<?php
}
}
?>
</ol></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
<tr>
<td><strong>热门评论文章</strong></td>
</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
<tr>
<td><ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(2,13,9,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>	
<li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=esub($bqr['title'],30)?></a></li>
<?php
}
}
?>
</ul></td>
</tr>
</table></td>
</tr>
</table>
<!-- 友情链接 -->
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="links">
<tr>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#E9F2FB" class="title">
<tr>
<td><strong>友情链接</strong></td>
          <td align="right">&nbsp;</td>
</tr>
</table>
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="box">
<tr>
          <td>
            <!-- 文字链接 -->
            <table width=100% border=0 cellpadding=3 cellspacing=0><tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select * from [!db.pre!]enewslink where checked=1 and lpic="" order by myorder limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>		           	
            	<td align=center><a href='<?=$bqr['lurl']?>' title='<?=$bqr['lname']?>' target=_blank><?=$bqr['lname']?></a></td>
        <?php
}
}
?>     	
            	</tr></table> 
            <hr width="100%" size="1" noshade="noshade" />
            <!-- logo链接 -->
            <table width=100% border=0 cellpadding=3 cellspacing=0><tr>
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select * from [!db.pre!]enewslink where checked=1 and lpic !="" order by myorder limit 8',0,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>         	
            	<td align=center><a href='<?=$bqr['lurl']?>' target=_blank><img src='<?=$bqr['lpic']?>' alt='<?=$bqr['lname']?>' border=0 width='<?=$bqr['width']?>' height='<?=$bqr['height']?>'></a></td>
        <?php
}
}
?>     	
            	</tr></table></td>
</tr>
</table></td>
</tr>
</table>
<!-- 页脚 -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="search">
<form action="/e/search/index.php" method="post" name="searchform" id="searchform">
<table border="0" cellspacing="6" cellpadding="0">
<tr>
<td><strong>站内搜索：</strong>
<input name="keyboard" type="text" size="32" id="keyboard" class="inputText" />
<input type="hidden" name="show" value="title" />
<input type="hidden" name="tempid" value="1" />
<select name="tbname">
<option value="news">新闻</option>
<option value="download">下载</option>
<option value="photo">图库</option>
<option value="flash">FLASH</option>
<option value="movie">电影</option>
<option value="shop">商品</option>
<option value="article">文章</option>
<option value="info">分类信息</option>
</select>
</td>
<td><input type="image" class="inputSub" src="/skin/default/images/search.gif" />
</td>
<td><a href="/search/" target="_blank">高级搜索</a></td>
</tr>
</table>
</form>
</td>
</tr>
<tr>
<td>
	<table width="100%" border="0" cellpadding="0" cellspacing="4" class="copyright">
        <tr> 
          <td align="center"><a href="/">网站首页</a> | <a href="#">关于我们</a> 
            | <a href="#">服务条款</a> | <a href="#">广告服务</a> | <a href="#">联系我们</a> 
            | <a href="#">网站地图</a> | <a href="#">免责声明</a> | <a href="/e/wap/" target="_blank">WAP</a></td>
        </tr>
        <tr> 
          <td align="center">Powered by <strong><a href="http://www.phome.net" target="_blank">EmpireCMS</a></strong> 
            <strong><font color="#FF9900">7.5</font></strong>&nbsp; &copy; 2002-2018 
            <a href="http://www.digod.com" target="_blank">EmpireSoft Inc.</a></td>
        </tr>
	</table>
</td>
</tr>
</table>
</body>
</html>