<?php
function gbk2utf8($data){
	if(is_array($data)){
		return array_map('gbk2utf8', $data);
	}
	$data=stripSlashes($data);
	return iconv('gbk','utf-8',$data);
}
function utf82gbk($data){
	if(is_array($data)){
		return array_map('utf82gbk', $data);
	}
	$data=stripSlashes($data);
	return iconv('utf-8','gbk',$data);
}
function checkV($cv=0){
	@include(ECMS_PATH.'e/class/EmpireCMS_version.php');
	$v=EmpireCMS_VERSION;
	$v=floatval($v)*10;
	if($cv){
		if($v>=$cv){
			return true;
		}
	}
	return $v;
}

function makejson($info,$result){
	global $qmessage_r,$fun_r,$message_r,$GLOBALS;
	@include('../'.LoadLang('pub/q_message.php'));
	$result=$result?$result:$info;
	if($fun_r[$info]!=''){
 		$info2 = $fun_r[$info];
	}elseif($message_r[$info]){
 		$info2 = $message_r[$info];
	}else{
		 
		$info2 = $qmessage_r[$info];
	}

	$arr=array(
		'err_msg'=>strstr($info,'Success')?'success':'error',
		'result'=>$result,
		'info'=>$info2
	);
	$arr = gbk2utf8($arr);
	echo json_encode($arr);
	exit();
}
//��������
function AddPl($username,$password,$nomember,$key,$saytext,$id,$classid,$repid,$add){
	global $empire,$dbtbpre,$public_r,$class_r,$level_r;
	//��֤��ʱ���������
	eCheckTimeCloseDo('pl');
	//��֤IP
	eCheckAccessDoIp('pl');
	$id=(int)$id;
	$repid=(int)$repid;
	$classid=(int)$classid;
	//��֤��
	$keyvname='checkplkey';
	if($public_r['plkey_ok'])
	{

		if(checkV()=='75'){
			ecmsCheckShowKey3($keyvname,$key,1);
		}else{
		    ecmsCheckShowKey2($keyvname,$key,1);
		}

		
	}
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	$muserid=(int)getcvar('mluserid');
	$musername=RepPostVar(getcvar('mlusername'));
	$mgroupid=(int)getcvar('mlgroupid');
	if($muserid)//�ѵ�½
	{
		$cklgr=qCheckLoginAuthstr();
		if($cklgr['islogin'])
		{
			$username=$musername;
		}
		else
		{
			$muserid=0;
		}
	}
	else
	{
		$nomember =1;
		if(empty($nomember))//������
		{
			if(!$username||!$password)
			{
				makejson("FailPassword","history.go(-1)",1);
			}
			$ur=$empire->fetch1("select ".eReturnSelectMemberF('userid,salt,password,checked,groupid')." from ".eReturnMemberTable()." where ".egetmf('username')."='$username' limit 1");
			if(empty($ur['userid']))
			{
				makejson("FailPassword","history.go(-1)",1);
			}
			if(!eDoCkMemberPw($password,$ur['password'],$ur['salt']))
			{
				makejson("FailPassword","history.go(-1)",1);
			}
			if($ur['checked']==0)
			{
				makejson("NotCheckedUser",'',1);
			}
			$muserid=$ur['userid'];
			$mgroupid=$ur['groupid'];
		}
		else
		{
			$muserid=0;
		}
	}
	if($public_r['plgroupid'])
	{
		if(!$muserid)
		{
			makejson("GuestNotToPl","history.go(-1)",1);
		}
		if($level_r[$mgroupid][level]<$level_r[$public_r['plgroupid']][level])
		{
			makejson("NotLevelToPl","history.go(-1)",1);
		}
	}
	//ר��
	$doaction=$add['doaction'];
	if($doaction=='dozt')
	{
		if(!trim($saytext)||!$classid)
		{
			makejson("EmptyPl","history.go(-1)",1);
		}
		//�Ƿ�ر�����
		$r=$empire->fetch1("select ztid,closepl,checkpl,restb from {$dbtbpre}enewszt where ztid='$classid'");
		if(!$r['ztid'])
		{
			makejson("ErrorUrl","history.go(-1)",1);
		}
		if($r['closepl'])
		{
			makejson("CloseClassPl","history.go(-1)",1);
		}
		//���
		if($r['checkpl'])
		{$checked=1;}
		else
		{$checked=0;}
		$restb=$r['restb'];
		$pubid='-'.$classid;
		$id=0;
		$pagefunr=eReturnRewritePlUrl($classid,$id,'dozt',0,0,1);
		$returl=$pagefunr['pageurl'];
	}
	else//��Ϣ
	{
		if(!trim($saytext)||!$id||!$classid)
		{
			makejson("EmptyPl","history.go(-1)",1);
		}
		//�����
		if(empty($class_r[$classid][tbname]))
		{
			makejson("ErrorUrl","history.go(-1)",1);
		}
		//�Ƿ�ر�����
		$r=$empire->fetch1("select classid,stb,restb from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
		if(!$r['classid']||$r['classid']!=$classid)
		{
			makejson("ErrorUrl","history.go(-1)",1);
		}
		if($class_r[$r[classid]][openpl])
		{
			makejson("CloseClassPl","history.go(-1)",1);
		}
		//����Ϣ�ر�����
		$pubid=ReturnInfoPubid($classid,$id);
		$finfor=$empire->fetch1("select closepl from {$dbtbpre}ecms_".$class_r[$classid][tbname]."_data_".$r['stb']." where id='$id' limit 1");
		if($finfor['closepl'])
		{
			makejson("CloseInfoPl","history.go(-1)",1);
		}
		//���
		if($class_r[$classid][checkpl])
		{$checked=1;}
		else
		{$checked=0;}
		$restb=$r['restb'];
		if(checkV()>70){
			$pagefunr=eReturnRewritePlUrl($classid,$id,'doinfo',0,0,1);
			$returl=$pagefunr['pageurl'];
		}
	}
	//���ò���
	$plsetr=$empire->fetch1("select pltime,plsize,plincludesize,plclosewords,plmustf,plf,plmaxfloor,plquotetemp from {$dbtbpre}enewspl_set limit 1");
	if(strlen($saytext)>$plsetr['plsize'])
	{
		$GLOBALS['setplsize']=$plsetr['plsize'];
		makejson("PlSizeTobig","history.go(-1)",1);
	}
	$time=time();
	$saytime=$time;
	$pltime=getcvar('lastpltime');
	if($pltime)
	{
		if($time-$pltime<$plsetr['pltime'])
		{
			$GLOBALS['setpltime']=$plsetr['pltime'];
			makejson("PlOutTime","history.go(-1)",1);
		}
	}
	$sayip=egetip();
	if(checkV()>70){
		$eipport=egetipport();
	}
	$username=str_replace("\r\n","",$username);
	$username=RepPostStr($username);
	$saytext=nl2br(RepFieldtextNbsp(RepPostStr($saytext)));
	$saytext=utf82gbk($saytext);
	if($repid)
	{
		$saytext=RepPlTextQuote($repid,$saytext,$plsetr,$restb);
		CkPlQuoteFloor($plsetr['plmaxfloor'],$saytext);//��֤¥��
	}
	//�����ַ�
	$saytext=ReplacePlWord($plsetr['plclosewords'],$saytext);
	if($level_r[$mgroupid]['plchecked'])
	{
		$checked=0;
	}
	$ret_r=ReturnPlAddF($add,$plsetr,0);
	//����
	if(checkV()>70){
		$sql=$empire->query("insert into {$dbtbpre}enewspl_".$restb."(pubid,username,sayip,saytime,id,classid,checked,zcnum,fdnum,userid,isgood,saytext,eipport".$ret_r['fields'].") values('$pubid','".$username."','$sayip','$saytime','$id','$classid','$checked',0,0,'$muserid',0,'".addslashes($saytext)."','$eipport'".$ret_r['values'].");"); 
	}else{
		$sql=$empire->query("insert into {$dbtbpre}enewspl_".$restb."(pubid,username,sayip,saytime,id,classid,checked,zcnum,fdnum,userid,isgood,saytext".$ret_r['fields'].") values('$pubid','".$username."','$sayip','$saytime','$id','$classid','$checked',0,0,'$muserid',0,'".addslashes($saytext)."'".$ret_r['values'].");");
	}
	$plid=$empire->lastid();
	if($doaction!='dozt')
	{
		//��Ϣ���1
		$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set plnum=plnum+1 where id='$id' limit 1");
	}
	//������������
	DoUpdateAddDataNum('pl',$restb,1);
	//������󷢱�ʱ��
	$set1=esetcookie("lastpltime",time(),time()+3600*24);
	ecmsEmptyShowKey($keyvname);//�����֤��
	if($sql)
	{
		$reurl=DoingReturnUrl($returl,$_POST['ecmsfrom']);
		makejson("AddPlSuccess",$reurl,1);
	}
	else
	{makejson("DbError","history.go(-1)",1);}
}

//�滻�ظ�
function RepPlTextQuote($repid,$saytext,$pr,$restb){
	global $public_r,$empire,$dbtbpre,$fun_r;
	$quotetemp=stripSlashes($pr['plquotetemp']);
	$r=$empire->fetch1("select userid,username,saytime,saytext from {$dbtbpre}enewspl_".$restb." where plid='$repid'");
	if(empty($r['username']))
	{
		$r['username']=$fun_r['nomember'];
	}
	if($r['userid'])
	{
		$r['username']="<a href=\"$public_r[newsurl]e/space/?userid=$r[userid]\" target=\"_blank\">$r[username]</a>";
	}
	$quotetemp=str_replace('[!--plid--]',$repid,$quotetemp);
	$quotetemp=str_replace('[!--pltime--]',date('Y-m-d H:i:s',$r['saytime']),$quotetemp);
	$quotetemp=str_replace('[!--username--]',$r['username'],$quotetemp);
	$quotetemp=str_replace('[!--pltext--]',$r['saytext'],$quotetemp);
	$restr=$quotetemp.$saytext;
	return $restr;
}

//ȥ��ԭ����
function RepYPlQuote($text){
	$preg_str="/<div (.+?)<\/div>/is";
	$text=preg_replace($preg_str,"",$text);
	return $text;
}

//����ͼƬ��ǩ
function RepPlImg($text){
	$preg_str="/\[img\](.+?)\[\/img\]/is";
	  $text=preg_replace($preg_str,"<img src=$1 style='max-width:100%' onclick=window.open('$1')>",$text);
	return  $text;
}

//��֤����¥��
function CkPlQuoteFloor($plmaxfloor,$saytext){
	if(!$plmaxfloor)
	{
		return '';
	}
	$fr=explode('<div',$saytext);
	$fcount=count($fr)-1;
	if($fcount>$plmaxfloor)
	{
		makejson('PlOutMaxFloor','history.go(-1)',1);
	}
}

//�����ַ�
function ReplacePlWord($plclosewords,$text){
	global $empire,$dbtbpre;
	if(empty($text))
	{
		return $text;
	}
	toCheckCloseWord2($text,$plclosewords,'HavePlCloseWords');
	return $text;
}

//��֤�����ַ�
function toCheckCloseWord2($word,$closestr,$mess){
	if($closestr&&$closestr!='|')
	{
		$checkr=explode('|',$closestr);
		$ckcount=count($checkr);
		for($i=0;$i<$ckcount;$i++)
		{
			if($checkr[$i])
			{
				if(stristr($checkr[$i],'##'))//����
				{
					$morer=explode('##',$checkr[$i]);
					if(stristr($word,$morer[0])&&stristr($word,$morer[1]))
					{
						makejson($mess,"history.go(-1)",1);
					}
				}
				else
				{
					if(stristr($word,$checkr[$i]))
					{
						makejson($mess,"history.go(-1)",1);
					}
				}
			}
		}
	}
}

//�����ֶ�
function ReturnPlAddF($add,$pr,$ecms=0){
	global $empire,$dbtbpre;
	$fr=explode(',',$pr['plf']);
	$count=count($fr)-1;
	$ret_r['fields']='';
	$ret_r['values']='';
	for($i=1;$i<$count;$i++)
	{
		$f=$fr[$i];
		$fval=RepPostStr($add[$f]);
		//����
		if(strstr($pr[plmustf],','.$f.','))
		{
			if(!trim($fval))
			{
				$chfr=$empire->fetch1("select fname from {$dbtbpre}enewsplf where f='$f' limit 1");
				$GLOBALS['msgmustf']=$chfr['fname'];
				makejson('EmptyPlMustF','',1);
			}
		}
		$fval=nl2br(RepFieldtextNbsp($fval));
		$ret_r['fields'].=",".$f;
		$ret_r['values'].=",'".addslashes($fval)."'";
	}
	return $ret_r;
}

//֧��/��������
function DoForPl($add){
	global $empire,$dbtbpre,$class_r;
	$classid=(int)$add['classid'];
	$id=(int)$add['id'];
	$plid=(int)$add['plid'];
	$dopl=(int)$add['dopl'];
	//ר��
	$doaction=$add['doaction'];
	if($doaction=='dozt')
	{
		if(!$classid||!$plid)
		{
			$doajax==1?ajax_makejson('','','ErrorUrl',1):makejson('ErrorUrl','',1);
		}
		$infor=$empire->fetch1("select ztid,restb from {$dbtbpre}enewszt where ztid='$classid'");
		if(!$infor['ztid'])
		{
			$doajax==1?ajax_makejson('','','ErrorUrl',1):makejson('ErrorUrl','',1);
		}
		$pubid='-'.$classid;
	}
	else//��Ϣ
	{
		if(!$classid||!$id||!$plid||!$class_r[$classid][tbname])
		{
			$doajax==1?ajax_makejson('','','ErrorUrl',1):makejson('ErrorUrl','',1);
		}
		$infor=$empire->fetch1("select classid,restb from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
		if(!$infor['classid'])
		{
			$doajax==1?ajax_makejson('','','ErrorUrl',1):makejson('ErrorUrl','',1);
		}
		$pubid=ReturnInfoPubid($classid,$id);
	}
	//��������
	if(getcvar('lastforplid'.$plid))
	{
		$doajax==1?ajax_makejson('','','ReDoForPl',1):makejson('ReDoForPl','',1);
	}
	if($dopl==1)
	{
		$f='zcnum';
		$msg='DoForPlGSuccess';
	}
	else
	{
		$f='fdnum';
		$msg='DoForPlBSuccess';
	}
	$sql=$empire->query("update {$dbtbpre}enewspl_".$infor['restb']." set ".$f."=".$f."+1 where plid='$plid' and pubid='$pubid'");
	if($sql)
	{
		esetcookie('lastforplid'.$plid,$plid,time()+30*24*3600);	//��󷢲�
		if($doajax==1)
		{
			$nr=$empire->fetch1("select ".$f." from {$dbtbpre}enewspl_".$infor['restb']." where plid='$plid' and pubid='$pubid'");
			ajax_makejson($nr[$f],$add['ajaxarea'],$msg,1);
		}
		else
		{
			makejson($msg,$_SERVER['HTTP_REFERER'],1);
		}
	}

}
//�����֤��
function ecmsCheckShowKey2($varname,$postval,$dopr,$ecms=0){
	global $public_r;



	$r=explode(',',getcvar($varname,$ecms));
	$cktime=$r[0];
	$pass=$r[1];
	$val=$r[2];
	$time=time();
	if($cktime>$time||$time-$cktime>$public_r['keytime']*60)
	{
		makejson('OutKeytime','',$dopr);
	}
	if(empty($postval)||md5($postval)<>$val)
	{
		makejson('FailKey','',$dopr);
	}
	$checkpass=md5(md5(md5($postval).'EmpireCMS'.$cktime).$public_r['keyrnd']);
	if($checkpass<>$pass)
	{
		makejson('FailKey','',$dopr);
	}
}


function ecmsCheckShowKey3($varname,$postval,$dopr,$ecms=0,$isadmin=0){
	global $public_r;
	$postval=trim($postval);
	if($isadmin==1)
	{
		$pubkeytime=$public_r['hkeytime'];
		$pubkeyrnd=$public_r['hkeyrnd'];
	}
	else
	{
		$pubkeytime=$public_r['keytime'];
		$pubkeyrnd=$public_r['keyrnd'];
	}
	$r=explode(',',getcvar($varname,$ecms));
	$cktime=(int)$r[0];
	$pass=$r[1];
	$val=$r[2];
	$time=time();
	if($cktime>$time||$time-$cktime>$pubkeytime)
	{
		makejson('OutKeytime','',$dopr);
		 
	}
	if(empty($postval))
	{
		makejson('OutKeytime','',$dopr);
	}
	$checkpass=md5('d!i#g?o-d-'.md5(md5($varname.'E.C#M!S^e-'.$postval).'-E?m!P.i#R-e'.$cktime).$pubkeyrnd.'P#H!o,m^e-e');
	if('dg'.$checkpass<>'dg'.$pass)
	{
		makejson('OutKeytime','',$dopr);
	}
}

?>