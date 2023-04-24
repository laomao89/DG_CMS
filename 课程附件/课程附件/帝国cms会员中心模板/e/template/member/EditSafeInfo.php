<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改安全信息";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr>
    <td>&nbsp;</td>
    <td><div align="right">[<a href="../EditInfo/">修改基本资料</a>]&nbsp;&nbsp;</div></td>
  </tr>
</table>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name=userinfoform method=post enctype="multipart/form-data" class="am-form" action=../doaction.php>
    <input type=hidden name=enews value=EditSafeInfo>
    <tr class="header"> 
      <td colspan="2">密码安全修改</td>
    </tr>
    <tr> 
      <td> <div align='left'>用户名 </div></td>
      <td> 
        <?=$user[username]?>
      </td>
    </tr>
    <tr> 
      <td> <div align='left'>原密码</div></td>
      <td> <input name='oldpassword' type='password' id='oldpassword' maxlength='20'>
        (修改密码或邮箱时需要密码验证)</td>
    </tr>
    <tr> 
      <td> <div align='left'>新密码</div></td>
      <td> <input name='password' type='password' id='password' maxlength='20'>
        (不想修改请留空)</td>
    </tr>
    <tr> 
      <td> <div align='left'>确认新密码</div></td>
      <td> <input name='repassword' type='password' id='repassword' maxlength='20'>
        (不想修改请留空)</td>
    </tr>
    <tr> 
      <td> <div align='left'>邮箱</div></td>
      <td> <input name='email' type='text' id='email' value='<?=$user[email]?>' maxlength='50'>
      </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td> <input type='submit' name='Submit' value='修改信息'>
      </td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>