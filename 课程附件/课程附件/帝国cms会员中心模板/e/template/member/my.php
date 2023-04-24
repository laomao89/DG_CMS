<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='帐号状态';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;帐号状态";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br> 
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr class="header"> 
    <td colspan="2">帐号状态</td>
  </tr>
  <tr>
    <td>用户ID:</td>
    <td> 
      <?=$user[userid]?>
    </td>
  </tr>
  <tr> 
    <td>用户名:</td>
    <td> 
      <?=$user[username]?>
     
    </td>
  </tr>
  <tr> 
    <td width="33%">注册时间:</td>
    <td width="67%"> 
      <?=$registertime?>
    </td>
  </tr>
  <tr> 
    <td>会员等级:</td>
    <td> 
      <?=$level_r[$r[groupid]][groupname]?>
    </td>
  </tr>
 
  <tr> 
    <td>剩余点数:</td>
    <td> 
      <?=$r[userfen]?>
      点</td>
  </tr>
  
  <tr> 
    <td>新短消息:</td>
    <td>
      <?=$havemsg?>
    </td>
  </tr>
</table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>