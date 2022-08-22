<?php
// ########################## SELECT 1 STEP Where########################
function select_query($sfield,$tables,$wfield,$ids,$condition=NULL){
	$sql="SELECT $sfield FROM $tables WHERE $wfield='$ids' $condition";
	$result=mysql_query($sql);
	$data = mysql_fetch_array($result);
	return $data;
	mysql_close($handle);
}
// ########################## SELECT 1 STEP No Where########################
function select_query_no($tables){
    $sql_no="SELECT * FROM $tables";
	$result_no=mysql_query($sql_no);
	
	return $result_no;
	mysql_close($handle);
}
// ########################## SELECT 2 STEP No Where########################
function select_query_nos($tables,$wfield,$ids){
    $sql_no="SELECT * FROM $tables Where $wfield='$ids'";
	$result_no=mysql_query($sql_no);
	
	return $result_no;
	mysql_close($handle);
}
// ########################## SELECT 1 STEP Where########################
function select_query_row($sfield,$tables,$wfield,$ids,$condition=NULL){
    $sql="SELECT $sfield FROM $tables WHERE $wfield='$ids' $condition";
	$result=mysql_query($sql);
	$data = mysql_num_rows($result);
	return $data;
	mysql_close($handle);
}
// ########################## SELECT 2 STEP Where########################
function select_query_2row($sfield,$tables,$wfield,$ids,$wfield2,$ids2,$condition=NULL){
   $sql2="SELECT $sfield FROM $tables WHERE $wfield='$ids' and $wfield2='$ids2' $condition";
	$result2=mysql_query($sql2);
	$data2 = @mysql_num_rows($result2);
	return $data2;
	//mysql_close($handle);
}
// ########################## SELECT 1 STEP Where########################
function select_query_row_no($sfield,$tables,$condition=NULL){
    $sql="SELECT $sfield FROM $tables $condition";
	$result=mysql_query($sql);
	$data = mysql_num_rows($result);
	return $data;
	mysql_close($handle);
}
// ####################### Insert data ##################################
function insert_row($sfield,$data,$tables){
    $sql="INSERT INTO $tables ($sfield) values ($data)";
	$result=mysql_query($sql);
//	return $data;
//mysql_close($handle);
}
function refresh($url){
echo "<meta http-equiv='refresh' content='2; url=$url'>" ;
}
// ####################### Insert data ##################################
function select_school($school_id){
  	$sql="SELECT school_name FROM main_school WHERE id='$school_id' and del='1'";
	$result=mysql_query($sql);
	$data = mysql_fetch_array($result);
	return $data;
	mysql_close($handle);
}
// ######################## UPDATE 1 ͹ STEP #########################
function update_query($tables,$sfield,$wfield,$ids){
	$sql="UPDATE $tables SET $sfield WHERE $wfield='$ids'";
	$result=mysql_query($sql);
	return true;
	mysql_close($handle);
}
// ########################## SELECT MAX########################
function select_query_max($max,$tables,$wfield,$ids){
    $sql_max="SELECT max($max) FROM $tables Where $wfield='$ids'";
	$result_max=mysql_query($sql_max);
	$max = mysql_fetch_array($result_max);
	if($max[0] == ''){
		$max = '1';
	}else{
		$max = $max[0]+1;
	}
	
	return $max;
	mysql_close($handle);
}
// ########################## SELECT MAX one########################
function select_query_max_one($max,$tables){
   	$sql_max="SELECT max($max) FROM $tables";
	$result_max=mysql_query($sql_max);
	$max = mysql_fetch_array($result_max);
	if($max[0] == ''){
		$max = '1';
	}else{
		$max = $max[0]+1;
	}
	
	return $max;
	mysql_close($handle);
}

// ########################## SUM ########################
function select_sumall($sfield,$tables,$wfield,$ids,$condition=NULL){
	$sql="SELECT $sfield FROM $tables WHERE $wfield='$ids' and $condition";
	$result=mysql_query($sql);
	$data = mysql_num_rows($result);
	return $data;
	mysql_close($handle);
}

?>