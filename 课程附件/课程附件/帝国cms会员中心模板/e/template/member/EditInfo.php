<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='修改资料';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;修改资料";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr>
    <td>&nbsp;</td>
    <td><div align="right">[<a href="EditSafeInfo.php">密码安全修改</a>]&nbsp;&nbsp;</div></td>
  </tr>
</table>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name=userinfoform method=post enctype="multipart/form-data" class="am-form" action=../doaction.php>
    <input type=hidden name=enews value=EditInfo>
    <tr class="header"> 
      <td colspan="2">修改基本资料</td>
    </tr>
    <tr> 
      <td> <div align='left'>用户名 </div></td>
      <td> 
        <?=$user[username]?>
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <?php
	@include($formfile);
	?>
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