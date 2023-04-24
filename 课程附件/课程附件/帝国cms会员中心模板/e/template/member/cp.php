<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$public_diyr['pagetitle']='会员中心';
$url="<a href=../../../>首页</a>&nbsp;>&nbsp;<a href=../cp/>会员中心</a>";
require(ECMS_PATH.'e/template/incfile/header.php');
?>
<div class="am-u-lg-10 am-u-md-10 am-u-sm-centered">

<div class="am-panel am-panel-default">
          <div class="am-panel-bd">
            <div class="am-g">
              <div class="am-u-md-4">
                <img class="am-img-circle am-img-thumbnail" src="<?=$userpic?>" width="100%" height="100%" alt="">
              </div>
              <div class="am-u-md-8">
                <p>你可以使用任何你喜欢的图像作为头像，但请不要违反互联网法规。 </p>
                <form name=userinfoform method=post enctype="multipart/form-data" class="am-form" action=../doaction.php>
    <input type=hidden name=enews value=EditInfo>
<input type="hidden" name="ecmsfrom" value="<?=$public_r['newsurl']?>/e/member/cp/">
                  <div class="am-form-group">
                    <input type="file" name="userpicfile">
                    <p class="am-form-help">请选择要上传的文件...</p>
                    <input type='submit' name='Submit' class="am-btn am-btn-primary am-btn-xs" value='保存'>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


<div class="am-alert am-alert-warning"><i class="am-icon-cog"></i><a href="<?=$public_r['newsurl']?>e/member/EditInfo/">修改资料</a></div>
<div class="am-alert am-alert-warning"><i class="am-icon-pencil-square-o"></i><a href="<?=$public_r['newsurl']?>e/DoInfo/">发布投稿</a></div>
<div class="am-alert am-alert-warning"><i class="am-icon-shopping-cart"></i><a href="<?=$public_r['newsurl']?>e/payapi/">财务中心</a></div>

  <ul class="am-list am-list-static am-list-border">
  <li>用户名:<span class="am-badge am-badge-success"><?=$user[username]?></span></li>
  <li>用户ID:<span class="am-badge am-badge-success"><?=$user[userid]?></span></li>
  <li>我的会员空间:<span class="am-badge"><a href="../../space/?userid=<?=$user[userid]?>" target="_blank">点此进入</a></span></li>
  <li>注册时间:<span class="am-badge am-badge-success"><?=$registertime?></span></li>
  <li>会员等级:<span class="am-badge am-badge-success"><?=$level_r[$r[groupid]][groupname]?></span></li>
  <li>剩余有效期:<span class="am-badge am-badge-success"><?=$userdate?>天</span></li>
  <li>剩余点数:<span class="am-badge am-badge-success"><?=$r[userfen]?>点</span></li>
  <li>帐户余额:<span class="am-badge am-badge-success"><?=$r[money]?>元</span></li>
  <li>新消息:<span class="am-badge am-badge-success"><?=$havemsg?></span></li>
  </ul>
</div>
<?php
require(ECMS_PATH.'e/template/incfile/footer.php');
?>