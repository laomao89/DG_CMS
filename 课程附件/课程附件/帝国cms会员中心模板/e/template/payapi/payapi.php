<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='在线支付';
$url="<a href='../../'>首页</a>&nbsp;>&nbsp;<a href=../member/cp/>会员中心</a>&nbsp;>&nbsp;在线支付";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function ChangeShowBuyFen(amount){
	var fen;
	fen=Math.floor(amount)*<?=$pr[paymoneytofen]?>;
	document.getElementById("showbuyfen").innerHTML=fen+" 点";
}
</script>
<form name="paytofenform" method="post" class="am-form" action="pay.php">
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
    <tr class="header"> 
      <td colspan="2">购买点数： 
      <input type="hidden" name="phome" value="PayToFen"></td>
    </tr>
    <tr> 
      <td>购买金额：</td>
      <td> <input name="money" type="text" value="" onchange="ChangeShowBuyFen(document.paytofenform.money.value);">
        元 <font color="#333333">( 1元 = 
        <?=$pr[paymoneytofen]?>
        点数)</font></td>
    </tr>
    <tr> 
      <td>购买点数：</td>
      <td id="showbuyfen"> 0 点</td>
    </tr>
    <tr> 
      <td>支付平台：</td>
      <td><SELECT name="payid" style="WIDTH: 120px">
          <?=$pays?>
        </SELECT></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="确定购买"></td>
    </tr>
  </table>
</form>
<br><br>
<form name="paytomoneyform" method="post" action="pay.php">
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
    <tr class="header"> 
      <td colspan="2">存预付款： 
      <input name="phome" type="hidden" id="phome" value="PayToMoney"></td>
    </tr>
    <tr> 
      <td>金额：</td>
      <td> <input name="money" type="text" value="">
        元</td>
    </tr>
    <tr> 
      <td>支付平台：</td>
      <td><SELECT name="payid" style="WIDTH: 120px">
          <?=$pays?>
        </SELECT></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit3" value="确定支付"></td>
    </tr>
  </table>
</form>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>