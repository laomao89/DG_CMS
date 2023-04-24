<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='配送地址列表';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../../member/cp/>会员中心</a>&nbsp;>&nbsp;配送地址列表&nbsp;&nbsp;(<a href='AddAddress.php?enews=AddAddress'>增加配送地址</a>)";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <tr>
    <td>&nbsp;</td>
    <td><div align="right">[<a href="AddAddress.php?enews=AddAddress">增加兑换地址</a>]&nbsp;&nbsp;</div></td>
  </tr>
</table>
<br>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
    <tr class="header">
      <td><div align="center">地址名称</div></td>
      <td><div align="center">默认</div></td>
      <td><div align="center">操作</div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		if($r['isdefault'])
		{
			$isdefault='是';
		}
		else
		{
			$isdefault='--';
		}
	?>
    <tr>
      <td><div align="center"><?=$r['addressname']?></div></td>
      <td><div align="center"><?=$isdefault?></div></td>
      <td><div align="center">[<a href="AddAddress.php?enews=EditAddress&addressid=<?=$r['addressid']?>">修改</a>] [<a href="../doaction.php?enews=DefAddress&addressid=<?=$r['addressid']?>" onclick="return confirm('确认要设为默认?');">默认</a>] [<a href="../doaction.php?enews=DelAddress&addressid=<?=$r['addressid']?>" onclick="return confirm('确认要删除?');">删除</a>]</div></td>
    </tr>
    <?php
	}
	?>
</table>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>