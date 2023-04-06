<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$buycar=getcvar('mybuycar');
$record="!";
$field="|";
$totalmoney=0;	//商品总金额
$buytype=0;	//支付类型：1为金额,0为点数
$totalfen=0;	//商品总积分
$buycarr=explode($record,$buycar);
$bcount=count($buycarr);
?>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name=form1 method=post class="am-form" action='../doaction.php'>
  <input type=hidden name=enews value=EditBuycar>
    <tr class='header'> 
      <td> <div align=center>图片</div></td>
      <td> <div align=center>商品名称</div></td>
      <td> <div align=center>需要积分</div></td>
      
      <td> <div align=center>数量</div></td>
      <td> <div align=center>小计</div></td>
      <td> <div align=center>删除</div></td>
    </tr>
<?php
for($i=0;$i<$bcount-1;$i++)
{
	$pr=explode($field,$buycarr[$i]);
	$productid=$pr[1];
	$fr=explode(",",$pr[1]);
	//ID
	$classid=(int)$fr[0];
	$id=(int)$fr[1];
	if(empty($class_r[$classid][tbname]))
	{
		continue;
	}
	//属性
	$addatt='';
	if($pr[2])
	{
		$addatt=$pr[2];
	}
	//数量
	$pnum=(int)$pr[3];
	if($pnum<1)
	{
		$pnum=1;
	}
	//取得产品信息
	$productr=$empire->fetch1("select title,tprice,price,isurl,titleurl,classid,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
	if(!$productr['id']||$productr['classid']!=$classid)
	{
		continue;
	}
	//是否全部点数
	if(!$productr[buyfen])
	{
		$buytype=1;
	}
	$totalfen+=$productr[buyfen]*$pnum;
	//产品图片
	if(empty($productr[titlepic]))
	{
		$productr[titlepic]="../../data/images/notimg.gif";
	}
	//返回链接
	$titleurl=sys_ReturnBqTitleLink($productr);
	$thistotal=$productr[price]*$pnum;
	$totalmoney+=$thistotal;
?>
<tr>
	<td align="center"><a href="<?=$titleurl?>" target="_blank"><img src="<?=$productr[titlepic]?>" border=0 width=80 height=80></a></td>
	<td align="center"><a href="<?=$titleurl?>" target="_blank"><?=$productr[title]?></a><?=$addatt?' - '.$addatt:''?></td>
	<td align="right"><?=$productr[buyfen]?>点</td>
	
	<td align="center"><input type="text" name="num[]" value="<?=$pnum?>" size="6"></td>
	<td align="right"><?=$productr[buyfen]*$pnum?>点</td>
	<td align="center"><input type="checkbox" name="del[]" value="<?=$productid.'|'.$addatt?>"></td>
	<input type="hidden" name="productid[]" value="<?=$productid?>">
	<input type="hidden" name="addatt[]" value="<?=$addatt?>">
</tr>
<?php
}
?>
<?php
if(!$buytype)//点数付费
{
?>
<tr> 

    <td colspan="5"><div align="right">合计消耗点数:<strong><?=$totalfen?></strong></div></td>
        <td colspan="5"><div align="right">兑换总金额:<strong><?=$totalfen/10?></strong>元</div></td>
    <td>&nbsp;</td>
</tr>
<?php
}
else
{
?>

<?php
}
?>
<tr> 
    <td colspan="7"><div align="right">
		<a href="../doaction.php?enews=ClearBuycar"><img src="../../data/images/shop/clearbuycar.gif" width=92 height=23 border=0></a>&nbsp;&nbsp;
          <input name="imageField" type="image" src="../../data/images/shop/editbuycar.gif" width=135 height=23 border=0>
          &nbsp;&nbsp;
		<a href="javascript:window.close();"><img src="../../data/images/shop/buynext.gif" width=87 height=23 border=0></a>
		&nbsp;&nbsp;
		<a href="../order/"><img src="../../data/images/shop/buycarnext.gif" width=87 height=19 border=0></a>
	</div></td>
</tr>
</form>
</table>
