<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

$public_diyr['pagetitle']='我的购物车';

$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>&nbsp;>&nbsp;购物车页面";

require(ECMS_PATH.'e/template/incfile/header.php');

?>

<?php
include('buycar/buycar_form.php');
?>
<?php

require(ECMS_PATH.'e/template/incfile/footer.php');

?>