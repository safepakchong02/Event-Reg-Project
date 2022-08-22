<?php
//เพิ่มเลข 0 หน้าวันหรือเดือนที่มีค่า 1 หลัก
function addZero($num){
	if(strlen($num) == 1){
		$num = "0".$num;
	}
	return $num;
}
//ใช้เปลี่ยน date จาก 2009-01-01 เป็น 01/01/2552 หรือ 1 มกราคม 2552
// f = ศุกร์ 1 มกราคม 2553
function dateToString($day,$com){
	list($y,$m,$d) = explode("-",$day);
	if($com == "/"){
		$day1 = addZero($d)."/".addZero($m)."/".($y+543);
		return $day1;
	}
	
	echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
	$_date = array('อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์');
	$month = array("1","2","3","4","5","6","7","8","9","10","11","12");
	$month1 = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายม","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$month2 = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	if($com == "s"){
		$m = $m+0;
		for($i=0;$i<count($month);$i++){
			if($m == $month[$i]){
				$day1 = $d." ".$month1[$i]." ".($y+543);
				return $day1;
			}
		}
	}
	
	if($com == "f"){
		$todate =  new DateTime("$y-$m-$d 00:00:00");		
		$day1 = $_date[$todate->format('w')]." ".($todate->format('d')+0) ." ".$month2[$todate->format('m')-1] ." ". ($todate->format(Y)+543);
		return $day1;
	}	
}
//ใช้เปลี่ยน date จาก 01/01/2552 หรือ 1 มกราคม 2552 เป็น 2009-01-01
function stringToDate($day){
	if(strpos($day,"/") > 0){
		list($d,$m,$y) = explode("/",$day);
		$day1 = ($y-543)."-".addZero($m)."-".addZero($d);
		return $day1;
	}else{
		list($d,$m,$y) = explode(" ",$day);
		echo"<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>";
		
		$month = array("1","2","3","4","5","6","7","8","9","10","11","12");
		$month1 = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายม","ตุลาคม","พฤศจิกายน","ธันวาคม");
		for($i=0;$i<count($month);$i++){
			if($m == $month1[$i]){
				$day1 = ($y-543)."-".addZero($month[$i])."-".addZero($d);
			}
		}
		return $day1;
	}
}


?>