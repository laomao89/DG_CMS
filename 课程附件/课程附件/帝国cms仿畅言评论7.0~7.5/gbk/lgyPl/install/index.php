<?php
require('../../../class/connect.php');
require('../../../class/db_sql.php');
$link=db_connect();
$empire=new mysqlquery();
$str = '';
if($_GET[enews]){
	if(file_exists('lock.off')){
		die('���۰�װ����������ɾ��installĿ¼�µ�lock.off�ٰ�װ��');
	}
	if($_GET[enews]=='reback'){
		$info = '��ԭ';
		$str = '||[~e.jy~]##1.gif||[~e.kq~]##2.gif||[~e.se~]##3.gif||[~e.sq~]##4.gif||[~e.lh~]##5.gif||[~e.ka~]##6.gif||[~e.hh~]##7.gif||[~e.ys~]##8.gif||[~e.ng~]##9.gif||[~e.ot~]##10.gif||';
		for($i=1;$i<=24;$i++){
			if($i<10){
				$num='0'.$i;
			}else{
				$num = $i;
			}
			$filename = 'new_face_'.$num.'.gif';
			@copy(ECMS_PATH.'e/data/face/'.$filename,'./'.$filename);
			@unlink(ECMS_PATH.'e/data/face/'.$filename);
		}
	}else{
		$tagname='][/����][/Ǯ][/��ŭ][/����][/����][/���][/��Ц][/ɫ][/�ܶ�][/����][/����][/�ɰ�][/����][/����][/ץ��][/����][/����][/��][/ǿ][/����][/ȭͷ][/��][/õ��][/����';
		$tagarr=explode('][/', $tagname);
		$info = '��װ';
		for($i=1;$i<=24;$i++){
			if($i<10){
				$num='0'.$i;
			}else{
				$num = $i;
			}
			$filename = 'new_face_'.$num.'.gif';
			$str.='||[/'.$tagarr[$i].']##'.$filename;
			@copy('./'.$filename,ECMS_PATH.'e/data/face/'.$filename);
			@unlink('./'.$filename);

		}
		$str.='||';
	}
	$sql = $empire->query("update {$dbtbpre}enewspl_set set plface='$str'");
	if($sql){
		echo "���۱���<font color=red>$info</font>�ɹ����뵽��̨�ֶ�[<font color=red>�������ݿ⻺��</font>]";
		file_put_contents('lock.off', '��װʱ�䣺'.date('Y-m-d H:i:s',time()));
	}
	exit();
}
db_close();
$empire=null;
?>
<style type="text/css">
	a{color:#fff;display: inline-block;padding:5px;text-decoration: none}
	a:hover{text-decoration: underline;color:red;}
 </style>
<div style="width:400px;margin:100px auto;text-align:center;background:#555;color:#fff;padding:10px;border-radius:5px;box-shadow:1px 1px 3px #ccc">
	<h3 style="text-shadow:1px 1px 5px #00FF61">�۹�cms�³������۲�����鰲װ��</h3>
	<p><a href="?enews=install">��װ</a>  <a href="?enews=reback">��ԭ</a></p>

	<p style="color:#8BC34A">�۹�cms���뵽����������</p>
	<p style="font-size:12px;line-height:18px;text-align:left;padding:10px">ע�⣺�����վ�Ѿ�ʹ��ԭ��ı��飬��װ֮���Ѿ����������۱��鲻���������ͣ������ʹ�ã�</p>
</div>
