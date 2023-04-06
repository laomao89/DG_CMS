<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='注册会员';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;注册会员";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name=userinfoform method=post enctype="multipart/form-data" class="am-form" action=../doaction.php>
    <input type=hidden name=enews value=register>
    <tr class="header"> 
      <td colspan="2">注册会员<?=$tobind?' (绑定账号)':''?></td>
    </tr>
    <tr> 
      <td colspan="2"><strong>基本信息 
        <input name="groupid" type="hidden" id="groupid" value="<?=$groupid?>">
        <input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
      </strong></td>
    </tr>
    <tr> 
      <td> <div align='left'>用户名</div></td>
      <td> <input name='username' type='text' id='username'>
        *</td>
    </tr>
    <tr> 
      <td> <div align='left'>密码</div></td>
      <td> <input name='password' type='password' id='password''>
        *</td>
    </tr>
    <tr> 
      <td> <div align='left'>重复密码</div></td>
      <td> <input name='repassword' type='password' id='repassword''>
        *</td>
    </tr>
    <tr> 
      <td> <div align='left'>邮箱</div></td>
      <td> <input name='email' type='text' id='email'>
        *</td>
    </tr>
    <tr> 
      <td colspan="2"><strong>其他信息</strong></td>
    </tr>
    
    <?php
	@include($formfile);
	?>

	<?
	if($public_r['regkey_ok'])
	{
	?>
    <tr>
      <td>验证码：</td>
      <td><input name="key" type="text" id="key"> 
        <img src="../../ShowKey/?v=reg"></td>
    </tr>
	<?
	}	
	?>
    <tr> 
      <td>&nbsp;</td>
      <td> <input type='submit' name='Submit' value='马上注册'> 
        &nbsp;&nbsp; <input type='button' name='Submit2' value='返回' onclick='history.go(-1)'></td>
    </tr>
    <tr> 
      <td colspan="2">说明：带*项为必填。</td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>