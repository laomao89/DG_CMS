<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//网页标题
$thispagetitle=$public_diyr['pagetitle']?$public_diyr['pagetitle']:'会员中心';
//会员信息
$tmgetuserid=(int)getcvar('mluserid');	//用户ID
$tmgetusername=RepPostVar(getcvar('mlusername'));	//用户名
$tmgetgroupid=(int)getcvar('mlgroupid');	//用户组ID
$tmgetgroupname='游客';
//会员组名称
if($tmgetgroupid)
{
	$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	if(!$tmgetgroupname)
	{
		include_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
		$tmgetgroupname=$level_r[$tmgetgroupid]['groupname'];
	}
}

//模型
$tgetmid=(int)$_GET['mid'];
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>
<?=$thispagetitle?>
</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="alternate icon" type="image/png" href="<?=$public_r['newsurl']?>skin/moyu_usercp/favicon.png">
<link rel="stylesheet" href="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.css"/>
<style>
.userxx{color:#3CF;}
.admin-icon-yellow {color: #ffbe40;}
.am-badge a{ color:#FFF}
.admin-content-list {border: 1px solid #e9ecf1;margin-top: 0;}
.admin-content-list li:first-child {border-left: none;}

</style>
</head>
<body>
<header class="am-topbar">
  <h1 class="am-topbar-brand"> <a href="<?=$public_r['newsurl']?>e/member/cp/">用户中心</a> </h1>
  <?php
	if($tmgetuserid)	//已登录
	{
	?>
  <div class="am-fl am-topbar-brand userxx"><span class="am-icon-star admin-icon-yellow"></span>您好，<?=$tmgetusername?></div>
  <?php
	}
	else	//游客
	{
	?>
    <div class="am-fl am-topbar-brand userxx"><span class="am-icon-star admin-icon-yellow"></span>您好，游客</div>
    <?php
	}
	?>
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
      class="am-icon-bars"></span></button>
  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
    <?php
	if($tmgetuserid)	//已登录
	{
	?>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-user"></span>用户信息<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=$public_r['newsurl']?>e/member/EditInfo/">修改资料</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/EditInfo/EditSafeInfo.php">修改安全信息</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/my/">帐号状态</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/fava/">收藏夹</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/friend/">好友列表</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/memberconnect/ListBind.php">绑定外部登录</a></li>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-envelope"></span>站内消息<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=$public_r['newsurl']?>e/member/msg/AddMsg/?enews=AddMsg">发送消息</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/msg/">消息列表</a></li>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-pencil-square"></span>发布信息<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
        <?php
			//输出可管理的模型
			$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
			while($tmodr=$empire->fetch($tmodsql))
			{
				$fontb="";
				$fontb1="";
				if($tmodr['mid']==$tgetmid)
				{
					$fontb="<b>";
					$fontb1="</b>";
				}
			?>
          <li><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>管理<?=$tmodr[qmname]?><?=$fontb1?></a></li>
          <li><a href="<?=$public_r['newsurl']?>e/DoInfo/ChangeClass.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>发布<?=$tmodr[qmname]?><?=$fontb1?></a></li>
          <?php
			}
			?>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-star"></span>财务中心<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=$public_r['newsurl']?>e/payapi/">在线支付</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/buygroup/">在线充值</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/card/">点卡充值</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/buybak/">点卡充值记录</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/downbak/">消费记录</a></li>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-shopping-cart"></span>积分兑换管理<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
           <li><a href="<?=$public_r['newsurl']?>misc/jfhxj/">积分换现金</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/ShopSys/ListDd/">我的订单</a></li>
          <li><a href="#ecms" onclick="window.open('<?=$public_r['newsurl']?>e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');">我的购物车</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">管理兑换地址</a></li>
        </ul>
      </li>
      <li><a href="<?=$public_r['newsurl']?>"><span class="am-icon-home"></span>网站首页</a></li>
      <li><a href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" onclick="return confirm('确认要退出?');"><span class="am-icon-circle-o-notch"></span>退出</a></li>
      <?php
	}
	else	//游客
	{
	?>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-user"></span>用户信息<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=$public_r['newsurl']?>e/member/EditInfo/">修改资料</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/EditInfo/EditSafeInfo.php">修改安全信息</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/my/">帐号状态</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/fava/">收藏夹</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/member/friend/">好友列表</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/memberconnect/ListBind.php">绑定外部登录</a></li>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-pencil-square"></span>发布信息<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
        <?php
			//输出可管理的模型
			$tmodsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
			while($tmodr=$empire->fetch($tmodsql))
			{
				$fontb="";
				$fontb1="";
				if($tmodr['mid']==$tgetmid)
				{
					$fontb="<b>";
					$fontb1="</b>";
				}
			?>
          <li><a href="<?=$public_r['newsurl']?>e/DoInfo/ListInfo.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>管理<?=$tmodr[qmname]?><?=$fontb1?></a></li>
          <li><a href="<?=$public_r['newsurl']?>e/DoInfo/ChangeClass.php?mid=<?=$tmodr['mid']?>"><?=$fontb?>发布<?=$tmodr[qmname]?><?=$fontb1?></a></li>
          <?php
			}
			?>
        </ul>
      </li>
      <li class="am-dropdown" data-am-dropdown> <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><span class="am-icon-shopping-cart">积分兑换管理<span class="am-icon-caret-down"></span> </a>
        <ul class="am-dropdown-content">
          <li><a href="<?=$public_r['newsurl']?>misc/jfhxj/">积分换现金</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/ShopSys/ListDd/">我的订单</a></li>
          <li><a href="#ecms" onclick="window.open('<?=$public_r['newsurl']?>e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');">我的购物车</a></li>
          <li><a href="<?=$public_r['newsurl']?>e/ShopSys/address/ListAddress.php">管理配送地址</a></li>
        </ul>
      </li>
      <li><a href="<?=$public_r['newsurl']?>"><span class="am-icon-home"></span>网站首页</a></li>
    <?php
	}
	?>
    </ul>
  </div>
</header>
<div class="am-g am-g-fixed blog-g-fixed">