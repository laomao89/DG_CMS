<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='注册会员';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;选择注册会员类型";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="ChRegForm" method="GET" class="am-form" action="index.php">
  <input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
    <tr class="header"> 
      <td><div align="center">选择注册会员类型<?=$tobind?' (绑定账号)':''?></div></td>
    </tr>
    <tr> 
      <td>
      <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
		<?php
		while($r=$empire->fetch($sql))
		{
			$checked='';
			if($r[groupid]==eReturnMemberDefGroupid())
			{
				$checked=' checked';
			}
		?>
          <tr>
            <td>
			<input type="radio" name="groupid" value="<?=$r[groupid]?>"<?=$checked?>>
              <?=$r[groupname]?>
            </td>
          </tr>
		<?php
		}
		?>
        </table></td>
    </tr>
    <tr> 
      <td> &nbsp;<input type="submit" name="button" value="下一步"></td>
    </tr>
  </form>
</table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>