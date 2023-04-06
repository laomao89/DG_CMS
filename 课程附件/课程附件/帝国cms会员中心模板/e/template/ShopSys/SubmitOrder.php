<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

$public_diyr['pagetitle']='订单确认';

$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;提交订单页面";

require(ECMS_PATH.'e/template/incfile/header.php');

?>
<?php
//显示配送方式
function ShowPs($pid){
	global $empire,$dbtbpre,$shoppr,$totalr;
	$pid=(int)$pid;
	$r=$empire->fetch1("select pid,pname,price,psay from {$dbtbpre}enewsshopps where pid='$pid' and isclose=0");
	if(empty($r[pid]))
	{
		printerror('请选择配送方式','',1,0,1);
	}
	$r['price']=ShopSys_PrePsTotal($r['pid'],$r['price'],$totalr['truetotalmoney'],$shoppr);
	echo" <table class='am-table am-table-bordered am-table-radius am-table-striped am-table-hover'>
  <tr> 
    <td> 
      <strong>".$r[pname]."</strong>
    </td>
    <td><strong>费用:￥".$r['price']."</strong></td>
  </tr>
  <tr> 
    <td colspan=2> <table class='am-table am-table-bordered am-table-radius am-table-striped am-table-hover'><tr><td>".$r[psay]."</td></tr></table></td>
  </tr>
</table>";
	return $r['price'];
}

//显示支付方式
function ShowPayfs($payfsid,$r,$price){
	global $empire,$public_r,$dbtbpre,$totalr,$shoppr;
	$payfsid=(int)$payfsid;
	$add=$empire->fetch1("select payid,payname,payurl,paysay,userpay,userfen from {$dbtbpre}enewsshoppayfs where payid='$payfsid' and isclose=0");
	if(empty($add[payid]))
	{
		printerror('请选择支付方式','',1,0,1);
	}
	//总金额
	$buyallmoney=$totalr['totalmoney']+$price-$totalr['pretotal'];
	if($add[userfen]&&$r[fp])
	{
		printerror("FenNotFp","history.go(-1)",1);
	}
	//发票
	if($r[fp])
	{
		$fptotal=($totalr['totalmoney']-$totalr['pretotal'])*($shoppr[fpnum]/100);
		$afp="+发票费(".$fptotal.")";
		$buyallmoney+=$fptotal;
	}
	$buyallfen=$totalr['totalfen']+$price;
	$returntotal="采购总额(".$totalr['totalmoney'].")+配送费(".$price.")".$afp."-优惠(".$totalr['pretotal'].")=总额(<b>".$buyallmoney." 元</b>)";
	$mytotal="结算总金额为:<b><font color=red>".$buyallmoney." 元</font></b> 全部";
	//是否登陆
	if($add[userfen]||$add[userpay])
	{
		if(!getcvar('mluserid'))
		{
			printerror("NotLoginTobuy","history.go(-1)",1);
		}
		$user=islogin();
		//点数购买
		if($add[userfen])
		{
			if($buyallfen>$user[userfen])
			{
				printerror("NotEnoughFenBuy","history.go(-1)",1);
			}
			$returntotal="采购总点数(".$totalr['totalfen'].")+配送点数费(".$price.")=总点数(<b>".$buyallfen." 点</b>)";
			$mytotal="结算总点数为:<b><font color=red>".$buyallfen." 点</font></b> 全部";
		}
		else//扣除余额
		{
			if($buyallmoney>$user[money])
			{
				printerror("NotEnoughMoneyBuy","history.go(-1)",1);
			}
		}
	}
	echo " <table class='am-table am-table-bordered am-table-radius am-table-striped am-table-hover'><tr><td>".$add[payname]."</td></tr></table>";
	$return[0]=$returntotal;
	$return[1]=$mytotal;
	return $return;
}
?>

<form action="../doaction.php" method="post" class="am-form" name="myorder" id="myorder">
<input type=hidden name=enews value=AddDd>
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
    <tr> 
      <td><strong>订单号: 
        <?=$ddno?>
        <input name="ddno" type="hidden" id="ddno" value="<?=$ddno?>">
        </strong></td>
    </tr>
    <tr> 
      <td><strong>选择的商品</strong></td>
    </tr>
    <tr> 
      <td> 
      <?php
	  include('buycar/buycar_order.php');
	  $totalr=array();
	  $totalr['totalmoney']=$totalmoney;
	  $totalr['buytype']=$buytype;
	  $totalr['totalfen']=$totalfen;
	  //优惠码
	  $prer=array();
	  $pretotal=0;
	  if($r['precode'])
	  {
		$prer=ShopSys_GetPre($r['precode'],$totalr['totalmoney'],$user,$classids);
		$pretotal=ShopSys_PreMoney($prer,$totalr['totalmoney']);
	  }
	  $totalr['pretotal']=$pretotal;
	  $totalr['truetotalmoney']=$totalr['totalmoney']-$pretotal;
	  ?>
	  </td>
    </tr>
    <tr> 
      <td><strong>收货人信息</strong></td>
    </tr>
    <tr> 
      <td><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <tr> 
            <td>真实姓名:</td>
            <td> 
              <?=$r[truename]?>
              <input name="truename" type="hidden" id="truename" value="<?=$r[truename]?>">            </td>
          </tr>
          <tr> 
            <td>支付宝帐号:</td>
            <td> 
              <?=$r[oicq]?>
              <input name="oicq" type="hidden" id="oicq" value="<?=$r[oicq]?>"></td>
          </tr>
         
          <tr> 
            <td>手机号码:</td>
            <td> 
              <?=$r[phone]?>
              <input name="phone" type="hidden" id="phone" value="<?=$r[phone]?>"></td>
          </tr>
          <tr> 
            <td>联系邮箱:</td>
            <td> 
              <?=$r[email]?>
              <input name="email" type="hidden" id="email" value="<?=$r[email]?>">            </td>
          </tr>
          
         
        </table></td>
    </tr>
	<?php
	if($shoppr['shoppsmust'])
	{
	?>
    <tr> 
      <td><strong>选择配送方式 
        <input name="psid" type="hidden" id="psid" value="<?=$r[psid]?>">
        </strong></td>
    </tr>
    <tr> 
      <td> 
      <?
	  $price=ShowPs($r[psid]);
	  ?>      </td>
    </tr>
	<?php
	}
	?>
	<?php
	if($shoppr['shoppayfsmust'])
	{
	?>
    <tr> 
      <td><strong>选择支付方式 
        <input name="payfsid" type="hidden" id="payfsid" value="<?=$r[payfsid]?>">
        </strong></td>
    </tr>
    <tr> 
      <td> 
        <?
	  $total=ShowPayfs($r[payfsid],$r,$price);
	  ?>      </td>
    </tr>
	<?php
	}
	?>
	<?php
	if($shoppr[havefp]&&$r[fp])
	{
	?>
        
      </table>
	  	<input name="fp" type="hidden" id="fp" value="<?=$r[fp]?>">
        <input name="fptt" type="hidden" id="fptt" value="<?=$r[fptt]?>">
		<input name="fpname" type="hidden" id="fpname" value="<?=$r[fpname]?>">	  </td>
    </tr>
	<?php
	}
	?>
    
   
    <tr>
      <td><strong>结算信息 
        </strong></td>
    </tr>
    <tr>
      <td><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
          <tr>
            <td><div align="center"><?=$total[0]?></div></td>
          </tr>
          <tr> 
            <td><div align="center">
                <?=$total[1]?>
              </div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td><div align="center"> 
          <input type="button" name="Submit3" value=" 上一步 " onclick="history.go(-1)">
		  &nbsp;&nbsp;
		  <input type="submit" name="Submit" value=" 提交订单 ">
        </div></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<?php

require(ECMS_PATH.'e/template/incfile/footer.php');

?>