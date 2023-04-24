<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='点卡充值';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;点卡充值";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<script>
function GetFen1()
{
var ok;
ok=confirm("确认要充值?");
if(ok)
{
document.GetFen.Submit.disabled=true
return true;
}
else
{return false;}
}
</script>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name=GetFen method=post action=../doaction.php class="am-form" onsubmit="return GetFen1();">
    <input type=hidden name=enews value=CardGetFen>
    <tr class="header"> 
      <td colspan="2"><div align="center">点卡冲值</div></td>
    </tr>
    <tr> 
      <td> <div align="right">冲值的用户名：</div></td>
      <td> <input name="username" type="text" id="username" value="<?=$user[username]?>">
        *</td>
    </tr>
    <tr> 
      <td> <div align="right">重复用户名：</div></td>
      <td> <input name="reusername" type="text" id="reusername" value="<?=$user[username]?>">
        *</td>
    </tr>
    <tr> 
      <td> <div align="right">冲值卡号：</div></td>
      <td> <input name="card_no" type="text" id="card_no">
        *</td>
    </tr>
    <tr> 
      <td> <div align="right">冲值卡密码：</div></td>
      <td> <input name="password" type="password" id="password">
        *</td>
    </tr>
    <tr> 
      <td> <div align="center"></div></td>
      <td> <input type="submit" name="Submit" value="开始冲值"> &nbsp; 
        <input type="reset" name="Submit2" value="重置"> </td>
    </tr>
    <tr> 
      <td colspan="2"> <div align="center">说明：带*的为必填项。</div></td>
    </tr>
  </form>
</table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>