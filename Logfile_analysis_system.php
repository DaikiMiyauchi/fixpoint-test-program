<html>
<head>
<title>���O�t�@�C�����</title>
</head>
<body>
<form action="log_fixpoint.php" method="post" enctype="multipart/form-data">
  �t�@�C���F
  <input type="file" name="upfile1" /><br />
�@�@�@�@�@�F
  <input type="file" name="upfile2" /><br />
  ���O1����<input type="checkbox" name="hour" value="1">
  <br />
�@�i�荞��<input type="checkbox" name="option" value="1">
�@<input type="text" name="getu1" size="2">��
�@<input type="text" name="hi1" size="2">���`
�@<input type="text" name="getu2" size="2">��
�@<input type="text" name="hi2" size="2">��
�@<input type="hidden" name="hide" value="1";>
  <input type="submit" value="���" />
  <br />
���O1���Ԃ�'��'�ŕ\������Ă��܂�
�@<br />

____________________________________________________________________________________________________________________
</form>

<?php
$f = 0;
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$x = 0;
$flag = 0;
$up1=0;
$up2=0;
if(isset($_POST['hide'])){
	if($_FILES['upfile1']['name']!=''){
	$logfile1 = $_FILES['upfile1']['tmp_name'];
	$up1=1;
	}
	
	if($_FILES['upfile2']['name']!=''){
	$logfile2 = $_FILES['upfile2']['tmp_name'];
	$up2=1;
	}

	if($up1!=1 && $up2!=1){
	echo '�t�@�C�����A�b�v���[�h����Ă��܂���';
	}
	
	if($_POST['option']==1){
		echo '�i�荞�݌���';
		echo '<br>';
		if($_POST['getu1']==''){
		}else{
			$getu1=$_POST['getu1'];
			$f++;
		}

		if($_POST['hi1']==''){
		}else{
			$hi1=$_POST['hi1'];
			$f++;
		}

		if($_POST['getu2']==''){
		}else{
			$getu2=$_POST['getu2'];
			$f++;
		}

		if($_POST['hi2']==''){
		}else{
			$hi2=$_POST['hi2'];
			$f++;
		}

	if($f!=4){
		echo '�����͂̍i�荞�ݍ��ڂ�����܂�';
		echo '<br>';
	}else{
		echo '���Ԃ�'.$getu1,'��'.$hi1.'���`'.$getu2.'��'.$hi2.'���ɍi���Ă��܂�';
		echo '<br>';
	}

     }
}

if($up1==1)
{
	$fp = fopen( $logfile1, 'r' );
	for( $count = 0; fgets( $fp ); $count++ );
	fclose($fp);

	$fp = fopen( $logfile1, 'r' );
	for($a=0; $a<$count; $a++)
	{
		$retu = fgets($fp);
		$inretu = explode(' ',$retu);

		//////////�����[�g�z�X�g($inretu[0])�Ǘ�//
		for($b=0; $b<=$x; $b++)
		{
			if($host[$b]==$inretu[0])
			{
				$host_count[$b]=$host_count[$b]+1;
				$flag = 1;
			}
		}
		if($flag!=1)
		{
			$host[$x]=$inretu[0];
			$host_count[$x]=1;
			$x++;
		}
		$flag = 0;

		///////////����($inretu[3])�Ǘ�///////////
		$time = explode(':',$inretu[3]);

		$times = explode('[',$time[0]);
		$times = explode('/',$times[1]);

		$time=(int)$time[1];

		if(0<=$time && $time<6){
		$i++;
		}elseif(6<=$time && $time<12){
		$j++;
		}elseif(12<=$time && $time<18){
		$k++;
		}elseif(18<=$time && $time<24){
		$l++;
		}
	////////////////////////////////////
		if($times[1]==Jan){
		$times[1]=1;
		}elseif($times[1]==Feb){
			$times[1]=2;
		}elseif($times[1]==Mar){
			$times[1]=3;
		}elseif($times[1]==Apr){
			$times[1]=4;
		}elseif($times[1]==May){
			$times[1]=5;
		}elseif($times[1]==June){
			$times[1]=6;
		}elseif($times[1]==July){
			$times[1]=7;
		}elseif($times[1]==Aug){
			$times[1]=8;
		}elseif($times[1]==Sept){
			$times[1]=9;
		}elseif($times[1]==Oct){
			$times[1]=10;
		}elseif($times[1]==Nov){
			$times[1]=11;
		}elseif($times[1]==Dec){
			$times[1]=12;
		}
	/////////////////////////////////////
	if($_POST['option']==1){
	    if($f==4){
		if($hi1 <= $times[0] && $times[0] <= $hi2){
			if($getu1 <= $times[1] && $times[1] <= $getu2){
				echo $retu;
				echo '<br>';
			}
		     }
		}
	}
		//////////////////////////////
	$now = getdate();
	if($_POST['hour']==1){
		if($now[mday]==$times[0]){
			if($now[mon] == $times[1]){
				if($now[hours] == $time + 1){
					echo '<br>';
					echo '��';
					echo $retu;
				}
			}
		}
	}
}
fclose($fp);
}

if($up2==1)
{
	$fp = fopen( $logfile2, 'r' );
	for( $count = 0; fgets( $fp ); $count++ );
	fclose($fp);

	$fp = fopen( $logfile2, 'r' );
	for($a=0; $a<$count; $a++)
	{
		$retu = fgets($fp);
		$inretu = explode(' ',$retu);

		//////////�����[�g�z�X�g($inretu[0])�Ǘ�//
		for($b=0; $b<=$x; $b++)
		{
			if($host[$b]==$inretu[0])
			{
				$host_count[$b]=$host_count[$b]+1;
				$flag = 1;
			}
		}
		if($flag!=1)
		{
			$host[$x]=$inretu[0];
			$host_count[$x]=1;
			$x++;
		}
		$flag = 0;

		///////////����($inretu[3])�Ǘ�///////////
		$time = explode(':',$inretu[3]);

		$times = explode('[',$time[0]);
		$times = explode('/',$times[1]);

		$time=(int)$time[1];

		if(0<=$time && $time<6){
		$i++;
		}elseif(6<=$time && $time<12){
		$j++;
		}elseif(12<=$time && $time<18){
		$k++;
		}elseif(18<=$time && $time<24){
		$l++;
		}
	////////////////////////////////////
		if($times[1]==Jan){
		$times[1]=1;
		}elseif($times[1]==Feb){
			$times[1]=2;
		}elseif($times[1]==Mar){
			$times[1]=3;
		}elseif($times[1]==Apr){
			$times[1]=4;
		}elseif($times[1]==May){
			$times[1]=5;
		}elseif($times[1]==June){
			$times[1]=6;
		}elseif($times[1]==July){
			$times[1]=7;
		}elseif($times[1]==Aug){
			$times[1]=8;
		}elseif($times[1]==Sept){
			$times[1]=9;
		}elseif($times[1]==Oct){
			$times[1]=10;
		}elseif($times[1]==Nov){
			$times[1]=11;
		}elseif($times[1]==Dec){
			$times[1]=12;
		}
	/////////////////////////////////////
	if($_POST['option']==1){
	    if($f==4){
		if($hi1 <= $times[0] && $times[0] <= $hi2){
			if($getu1 <= $times[1] && $times[1] <= $getu2){
				echo $retu;
				echo '<br>';
			}
		     }
		}
	}
		//////////////////////////////
	$now = getdate();
	if($_POST['hour']==1){
		if($now[mday]==$times[0]){
			if($now[mon] == $times[1]){
				if($now[hours] == $time + 1){
					echo '<br>';
					echo '��';
					echo $retu;
				}
			}
		}
	}
}
fclose($fp);
}
	if($up1==1 || $up2==1){
	echo '<br>';
	echo '<br>';
	echo '��͌���(�����[�g�z�X�g�� : �A�N�Z�X��)';
	echo '<br>';
?>
	<TABLE border="1" align="left">
	<TR>
	<TD>�ߑO0���`�ߑO6��</TD>
	<TD>�ߑO6���`����</TD>
	<TD>���߁`�ߌ�18��</TD>
	<TD>�ߌ�18���`�ߑO0��</TD>
	</TR>
	<TR>
	<TD><?php echo $i; ?></TD>
	<TD><?php echo $j; ?></TD>
	<TD><?php echo $k; ?></TD>
	<TD><?php echo $l; ?></TD>
	</TR>
	
<?php
	for($b=0; $b<$x; $b++)
	{
		$var[$host[$b]] = $host_count[$b];
	}
arsort($var);
	foreach($var as $key => $value){
		print $key.' : '.$value;
		echo '<br>';
	}
}
?>
</body>
</html>
