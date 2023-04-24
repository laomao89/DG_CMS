<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员登录';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;会员登录";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<br>
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="form1" method="post"  class="am-form" action="../doaction.php">
    <input type=hidden name=ecmsfrom value="<?=ehtmlspecialchars($_GET['from'])?>">
    <input type=hidden name=enews value=login>
	<input name="tobind" type="hidden" id="tobind" value="<?=$tobind?>">
    <tr class="header"> 
      <td colspan="2"><div align="center">会员登录<?=$tobind?' (绑定账号)':''?></div></td>
    </tr>
    <tr> 
      <td>用户名：</td>
      <td><input name="username" type="text" id="username">
	  	<?php
		if($public_r['regacttype']==1)
		{
		?>
        &nbsp;&nbsp;<a href="../register/regsend.php" target="_blank">帐号未激活？</a>
		<?php
		}
		?>
		</td>
    </tr>
    <tr> 
      <td>密码：</td>
      <td><input name="password" type="password" id="password">
        &nbsp;&nbsp;<a href="../GetPassword/" target="_blank">忘记密码？</a></td>
    </tr>
	 <tr>
      <td>保存时间：</td>
      <td>
	  <input name=lifetime type=radio value=0 checked>
        不保存
	    <input type=radio name=lifetime value=3600>
        一小时 
        <input type=radio name=lifetime value=86400>
        一天 
        <input type=radio name=lifetime value=2592000>
        一个月
<input type=radio name=lifetime value=315360000>
        永久 </td>
    </tr>
    <?php
	if($public_r['loginkey_ok'])
	{
	?>
    <tr> 
      <td>验证码：</td>
      <td><input name="key" type="text" id="key" size="6">
        <img src="../../ShowKey/?v=login"></td>
    </tr>
    <?php
	}	
	?>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value=" 登 录 ">&nbsp;&nbsp;&nbsp; <input type="button" name="button" value="马上注册" onclick="parent.location.href='../register/<?=$tobind?'?tobind=1':''?>';"></td>
    </tr>
	</form>
  </table>
<br>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>