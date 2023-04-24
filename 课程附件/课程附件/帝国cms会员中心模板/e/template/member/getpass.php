<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='取回密码';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;取回密码";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped">
  <form name="GetPassForm" method="POST" class="am-form" action="../doaction.php">
    <tr class="header"> 
      <td colspan="2"><div align="center">重设密码</div></td>
    </tr>
    <tr> 
      <td>用户名</td>
      <td><?=$username?></td>
    </tr>
    <tr> 
      <td>新密码</td>
      <td><input name="newpassword" type="password" id="newpassword"></td>
    </tr>
    <tr>
      <td>重复新密码</td>
      <td><input name="renewpassword" type="password" id="renewpassword"></td>
    </tr>
    <tr> 
      <td>&nbsp; </td>
      <td> <input type="submit" name="button" value="修改"> 
        <input name="enews" type="hidden" id="enews" value="DoGetPassword">
        <input name="id" type="hidden" id="id" value="<?=$r[id]?>">
        <input name="tt" type="hidden" id="tt" value="<?=$r[tt]?>">
        <input name="cc" type="hidden" id="cc" value="<?=$r[cc]?>"></td>
    </tr>
  </form>
</table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>