<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

$public_diyr['pagetitle']='提交订单页面';

$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;提交订单页面";

require(ECMS_PATH.'e/template/incfile/header.php');

?>
<script>
function PrintDd()
{
	pdiv.style.display="none";
	window.print();
}
</script>

<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr> 
    <td><strong>订单号: 
      <?=$r[ddno]?>
      </strong></td>
    <td><strong>下单时间: 
      <?=$r[ddtime]?>
      </strong></td>
  </tr>
  <tr> 
    <td colspan="2"><strong>商品信息</strong></td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <?php
	  $buycar=$addr['buycar'];
	  $payby=$r['payby'];
	  include('buycar/buycar_showdd.php');
	  ?>
    </td>
  </tr>
  <tr> 
    <td colspan="2"><strong>订单信息</strong></td>
  </tr>
  <tr> 
    <td colspan="2"><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
        <tr> 
          <td> 
            <div align="right">订单号：</div></td>
          <td><strong> 
            <?=$r[ddno]?>
            </strong></td>
          <td> 
            <div align="right">订单状态：</div></td>
          <td><strong> 
            <?=$ha?>
            </strong>/<strong> 
            <?=$ou?>
            </strong>/<strong> 
            <?=$ch?>
            </strong> 
            <?=$topay?>          </td>
        </tr>
        <tr> 
          <td> 
            <div align="right">下单时间：</div></td>
          <td><strong> 
            <?=$r[ddtime]?>
            </strong></td>
          <td><div align="right">商品总金额：</div></td>
          <td><strong>
            <?=$alltotal?>
            </strong></td>
        </tr>
        
        <tr> 
          <td> 
            <div align="right">支付方式：</div></td>
          <td><strong>
            <?=$payfsname?>
            </strong></td>
         <td><div align="right">订单总金额：</div></td>
          <td><strong>
            <?=$mytotal?>
          </strong></td>
        </tr>
    
     
      </table></td>
  </tr>
  <tr> 
    <td colspan="2"><strong>收货人信息</strong></td>
  </tr>
  <tr> 
    <td colspan="2"><table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
        <tr> 
          <td>真实姓名:</td>
          <td> 
            <?=$r[truename]?>          </td>
        </tr>
        <tr> 
          <td>支付宝帐号:</td>
          <td> 
            <?=$r[oicq]?>          </td>
        </tr>
        
        <tr> 
          <td>手机号码:</td>
          <td> 
            <?=$r[phone]?>          </td>
        </tr>
        <tr> 
          <td>联系邮箱:</td>
          <td> 
            <?=$r[email]?>          </td>
     
      </table></td>
  
 
  <tr> 
    <td colspan="2"><div align="center"> 
        <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" id="pdiv">
          <tr> 
            <td><div align="center">
                <input type="button" name="Submit" value=" 打 印 " onclick="javascript:PrintDd();">
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>