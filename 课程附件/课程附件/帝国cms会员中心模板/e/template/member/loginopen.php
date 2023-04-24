<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
<title>登录</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="alternate icon" type="image/png" href="<?=$public_r['newsurl']?>skin/moyu_usercp/favicon.png">
<link rel="stylesheet" href="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.css"/>
</head>

<body>
  <table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover">
  <form name="form1" method="post" class="am-form" action="../doaction.php">
    <input type=hidden name=ecmsfrom value="<?=ehtmlspecialchars($_GET['from'])?>">
    <input type=hidden name=prtype value="<?=ehtmlspecialchars($_GET['prt'])?>">
    <input type=hidden name=enews value=login>
    <tr class="header"> 
      <td colspan="2"><div align="center">会员登陆</div></td>
    </tr>
    <tr> 
      <td>用户名：</td>
      <td><input name="username" type="text" id="username"></td>
    </tr>
    <tr> 
      <td>密码：</td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
	 <tr>
      <td>保存：</td>
      <td> 
        <select name="lifetime">
          <option value="0">不保存</option>
		  <option value="3600">一小时</option>
		  <option value="86400">一天</option>
		  <option value="2592000">一个月</option>
		  <option value="315360000">永久</option>
        </select>
     </td>
    </tr>
    <?php
	if($public_r['loginkey_ok'])
	{
	?>
    <tr> 
      <td>验证码：</td>
      <td><input name="key" type="text" id="key">
        <img src="../../ShowKey/?v=login"></td>
    </tr>
    <?php
	}	
	?>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="登陆"> <input type="button" name="button" value="注册" onclick="window.open('../register/');"></td>
    </tr>
	</form>
  </table>
    <!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/rem.min.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/respond.min.js"></script>
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.legacy.js"></script>
<![endif]--> 

<!--[if (gte IE 9)|!(IE)]><!--> 
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/jquery.min.js"></script> 
<script src="<?=$public_r['newsurl']?>skin/moyu_usercp/amazeui.min.js"></script> 
<!--<![endif]-->
</body>
</html>