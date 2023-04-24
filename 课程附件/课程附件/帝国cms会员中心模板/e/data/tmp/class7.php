<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>图片频道</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="/skin/default/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/skin/default/js/tabs.js"></script>
</head>
<body class="channle">
<!-- 页头 -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="top">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="63%"> 
<!-- 登录 -->

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
		<td class="news_list"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
			<tr>
				<td>您当前的位置：<a href="/">首页</a>&nbsp;>&nbsp;<a href="/news/">新闻中心</a></td>
			</tr>
		</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>国内新闻</strong></td>
					<td align="right"><a href="/news/china/">更多&gt;&gt;</a></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>

						<li><a href="/news/china/2012-12-10/69.html" title="广东丹霞山发现巨型"青铜剑"(组图)">广东丹霞山发现巨型&quot;青铜剑&quot;(组图)</a> <span>2012-12-10</span></li>

						<li><a href="/news/china/2012-12-10/68.html" title="驻日大使崔天凯:胡锦涛主席访日有三点值得关注">驻日大使崔天凯:胡锦涛主席访日有三点值</a> <span>2012-12-10</span></li>

						<li><a href="/news/china/2012-12-10/67.html" title="杭州湾跨海大桥日均车流量逾10万(组图)">杭州湾跨海大桥日均车流量逾10万(组图)</a> <span>2012-12-10</span></li>

						<li><a href="/news/china/2012-12-10/66.html" title="广东省物价局：粮价节后上涨不可信">广东省物价局：粮价节后上涨不可信</a> <span>2012-12-10</span></li>

						<li><a href="/news/china/2012-12-10/65.html" title="柏杨葬礼将于14日举行 骨灰抛撒绿岛海面">柏杨葬礼将于14日举行 骨灰抛撒绿岛海面</a> <span>2012-12-10</span></li>

					</ul>
					</td>
				</tr>
			</table><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>国际新闻</strong></td>
					<td align="right"><a href="/news/world/">更多&gt;&gt;</a></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>

						<li><a href="/news/world/2012-12-10/72.html" title="中国紧急援助物资运抵缅甸仰光(组图)">中国紧急援助物资运抵缅甸仰光(组图)</a> <span>2012-12-10</span></li>

						<li><a href="/news/world/2012-12-10/70.html" title="俄罗斯第三任总统梅德韦杰夫宣誓就职">俄罗斯第三任总统梅德韦杰夫宣誓就职</a> <span>2012-12-10</span></li>

						<li><a href="/news/world/2012-12-10/15.html" title="中国紧急援助物资运抵缅甸仰光(组图)">中国紧急援助物资运抵缅甸仰光(组图)</a> <span>2012-12-10</span></li>

						<li><a href="/news/world/2012-12-10/14.html" title="印度成功试射一枚“烈火－3”型导弹">印度成功试射一枚“烈火－3”型导弹</a> <span>2012-12-10</span></li>

						<li><a href="/news/world/2012-12-10/13.html" title="马来红新月会宣布将向缅甸派出救灾小组">马来红新月会宣布将向缅甸派出救灾小组</a> <span>2012-12-10</span></li>

					</ul>
					</td>
				</tr>
			</table><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>娱乐新闻</strong></td>
					<td align="right"><a href="/news/ent/">更多&gt;&gt;</a></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>

						<li><a href="/news/ent/2012-12-10/76.html" title="“最美清洁工”原是《赤壁》宫女">“最美清洁工”原是《赤壁》宫女</a> <span>2012-12-10</span></li>

						<li><a href="/news/ent/2012-12-10/75.html" title="尹馨大胆亮相《男人装》 嫩肤美腿勾人魂">尹馨大胆亮相《男人装》 嫩肤美腿勾人魂</a> <span>2012-12-10</span></li>

						<li><a href="/news/ent/2012-12-10/74.html" title="传张艺谋因执导奥运身价涨5倍">传张艺谋因执导奥运身价涨5倍</a> <span>2012-12-10</span></li>

						<li><a href="/news/ent/2012-12-10/73.html" title="张曼玉广告写真花絮曝光 流露优雅从容">张曼玉广告写真花絮曝光 流露优雅从容</a> <span>2012-12-10</span></li>

					</ul>
					</td>
				</tr>
			</table><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>体育新闻</strong></td>
					<td align="right"><a href="/news/sports/">更多&gt;&gt;</a></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>

						<li><a href="/news/sports/2012-12-10/78.html" title="中国男乒第16次捧起斯韦思林杯">中国男乒第16次捧起斯韦思林杯</a> <span>2012-12-10</span></li>

						<li><a href="/news/sports/2012-12-10/77.html" title="科比专为大场面而生">科比专为大场面而生</a> <span>2012-12-10</span></li>

						<li><a href="/news/sports/2012-12-10/71.html" title="奥运圣火成功登顶珠峰">奥运圣火成功登顶珠峰</a> <span>2012-12-10</span></li>

					</ul>
					</td>
				</tr>
			</table><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
				<tr>
					<td><strong>头条新闻</strong></td>
					<td align="right"><a href="/news/toutiaoxinwen/">更多&gt;&gt;</a></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>

						<li><a href="/news/toutiaoxinwen/2021-04-14/79.html" title="外交部：海洋不是日本的垃圾桶，太平洋也不是日本的下水道！">外交部：海洋不是日本的垃圾桶，太平洋也不是</a> <span>2021-04-14</span></li>

					</ul>
					</td>
				</tr>
			</table></td>
		<td class="sider"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
			<tr>
				<td><strong>推荐资讯</strong></td>
			</tr>
		</table>
			<table width="100%" border="0" cellspacing="8" cellpadding="0" class="box">
				<tr>
					<td><table width=100% border=0 cellpadding=3 cellspacing=0>
						<tr>
						<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',2,2,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
							<td align=center><a href='<?=$bqsr["titleurl"]?>' target=_blank>
							<img src='<?$bqr['titlepic']?>' width='128' height='90' border=0
							alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=bqr['title']?></span></a></td>
						<?php
}
}
?>
						</tr>
						<tr>
						<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo','2,2',2,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
							<td align=center><a href='<?=$bqsr["titleurl"]?>' target=_blank>
								<img src='<?$bqr['titlepic']?>' width='128' height='90' border=0
								alt='<?=$bqr['title']?>'><br><span style='line-height:15pt'><?=bqr['title']?>
								</span></a></td>
						<?php
}
}
?>
						</tr></table></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
				<tr>
					<td><strong>最后更新</strong></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ul>
					<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',10,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
						<li><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"
						><?=esub($bqr['title'],30)?></a></li>
					<?php
}
}
?>
					</ul></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title margin_top">
				<tr>
					<td><strong>热门点击</strong></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
				<tr>
					<td><ol class="rank">
					<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',10,1,0);
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
