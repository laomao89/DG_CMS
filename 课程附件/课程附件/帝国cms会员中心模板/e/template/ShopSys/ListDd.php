<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='订单列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;订单列表";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script src=../../data/images/setday.js></script>
<form name="form1" method="get" class="am-form" action="index.php">
  <table class='am-table am-table-bordered am-table-radius am-table-striped am-table-hover'>
    <tr> 
      <td>订单号为: 
        <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
        时间从 
        <input name="starttime" type="text" id="starttime2" value="<?=$starttime?>" onclick="setday(this)">
        到 
        <input name="endtime" type="text" id="endtime2" value="<?=$endtime?>" onclick="setday(this)">
        止的订单 
        <input type="submit" name="Submit6" value="搜索"> <input name="sear" type="hidden" id="sear2" value="1"> 
      </td>
    </tr>
  </table>
</form>
<table class='am-table am-table-bordered am-table-radius am-table-striped am-table-hover'>
    <tr class=header> 
      <td> <div align="center">序号</div></td>
      <td><div align="center">编号(点击查看)</div></td>
      <td><div align="center">订购时间</div></td>
      <td><div align="center">总积分</div></td>
      <td><div align="center">支付方式</div></td>
      <td><div align="center">状态</div></td>
      <td><div align="center">操作</div></td>
    </tr>
<?
$todaytime=time();
$j=0;
while($r=$empire->fetch($sql))
{
	$j++;
	//点数购买
	$total=0;
	if($r[payby]==1)
	{
		$total=$r[alltotalfen]+$r[pstotal];
		$mytotal="<a href='#ecms' title='商品额(".$r[alltotalfen].")+运费(".$r[pstotal].")'>".$total." 点</a>";
	}
	else
	{
		//发票
		$fpa='';
		$pre='';
		if($r[fp])
		{
			$fpa="+发票费(".$r[fptotal].")";
		}
		//优惠
		if($r['pretotal'])
		{
			$pre="-优惠(".$r[pretotal].")";
		}
		$total=$r[alltotal]+$r[pstotal]+$r[fptotal]-$r[pretotal];
		$mytotal="<a href='#ecms' title='商品额(".$r[alltotal].")+运费(".$r[pstotal].")".$fpa.$pre."'>".$total." 元</a>";
	}
	//支付方式
	if($r[payby]==1)
	{
		$payfsname=$r[payfsname]."<br>(点数购买)";
	}
	elseif($r[payby]==2)
	{
		$payfsname=$r[payfsname]."<br>(余额购买)";
	}
	else
	{
		$payfsname=$r[payfsname];
	}
	//状态
	if($r['checked']==1)
	{
		$ch="已确认";
	}
	elseif($r['checked']==2)
	{
		$ch="取消";
	}
	elseif($r['checked']==3)
	{
		$ch="退货";
	}
	else
	{
		$ch="<font color=red>未确认</font>";
	}
	if($r['outproduct']==1)
	{
		$ou="已发货";
	}
	elseif($r['outproduct']==2)
	{
		$ou="备货中";
	}
	else
	{
		$ou="<font color=red>未发货</font>";
	}
	if($r['haveprice']==1)
	{
		$ha="已付款";
	}
	else
	{
		$ha="<font color=red>未付款</font>";
	}
	//操作
	$doing='<a href="../doaction.php?enews=DelDd&ddid='.$r[ddid].'" onclick="return confirm(\'确认要取消？\');">取消</a>';
	if($r['checked']||$r['outproduct']||$r['haveprice'])
	{
		$doing='--';
	}
	$dddeltime=$shoppr['dddeltime']*60;
	if($todaytime-$dddeltime>to_time($r['ddtime']))
	{
		$doing='--';
	}
	?>
    <tr> 
      <td> <div align="center">
          <?=$j?>
          </div></td>
      <td> <div align="center"><a href="../ShowDd/?ddid=<?=$r[ddid]?>"> 
          <?=$r[ddno]?>
          </a></div></td>
      <td> <div align="center"> 
          <?=$r[ddtime]?>
        </div></td>
      <td> <div align="center"> 
          <?=$mytotal?>
        </div></td>
      <td><div align="center"> 
          <?=$payfsname?>
        </div></td>
      <td> <div align="center"><strong> 
          <?=$ha?>
          </strong>/<strong> 
          <?=$ou?>
          </strong>/<strong> 
          <?=$ch?>
          </strong></div></td>
      <td><div align="center"><?=$doing?></div></td>
    </tr>
<?
}
?>
    <tr> 
      <td> <div align="center"></div></td>
      <td colspan="6"> <div align="left">&nbsp; 
          <?=$returnpage?>
        </div></td>
    </tr>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>