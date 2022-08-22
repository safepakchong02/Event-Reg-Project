<?php

// ########################## SELECT 1 เเพิ่มเรียบร้อย########################
function form_complete($url){
  echo "<center>";
  	echo "</br></br>";
	echo "<img src='".$_SESSION['web_http']."main_data/images/loading.gif' width='11%'></br>";
  	echo "<font color='green'>";
		echo "<b>บันทึกข้อมูลเรียบร้อย </b>";
	echo "</font>";	
  echo "</center></br></br>";
  echo "<meta http-equiv='refresh' content='2; url=$url'>" ;

}
// ########################## SELECT 1 แก้ไขเรียบร้อย########################
function form_edit($url){
  echo "<center>";
  	echo "</br></br>";
	echo "<img src='main_data/images/ok.gif' width='60px' height='60px'></br>";
  	echo "<font color='green'>";
		echo "<b>ทำการแก้ไขข้อมูลเรียบร้อย </br>กรุณารอสักครู่กำลังกลับเข้าสู่ระบบ</b>";
	echo "</font>";	
  echo "</center></br></br>";
  echo "<meta http-equiv='refresh' content='2; url=$url'>" ;

}
// ########################## SELECT 1 STEP No Where########################
function edit($data){
echo '<img src="main_data/images/documentwrite.png" width="15px" height="15px" title="'.$data.'" >';
}
function permis($data){
echo '<img src="main_data/images/group.png" width="15px" height="15px" title="'.$data.'">';
}
function del($data){
echo '<img src="main_data/images/Close2.png" width="15px" height="15px" title="'.$data.'">';
}
function add($data){
echo '<img src="main_data/images/add.png" width="15px" height="15px" title="'.$data.'" >';
}
function headers($head){
	 echo"<table width='100%' border='0' cellpadding='0' cellspacing='0' align='center'>";
			echo "<tr>";
				echo"<td colspan='3'>";
					echo '<hr></hr>';
						echo $head;
					echo '<hr></hr>';
				echo"</td>";		
			echo"</tr>";
	 echo "</table>";
}

function uprename($filename,$fileupload){
							$temp_name=$fileupload;
							$userfile1_name=trim($filename);
							$str  = "123456789abcdefghijkmnpqrstuvwxyz";
							$pic1 = substr(str_shuffle($str), 0, 9);
							if ($strings=substr($userfile1_name,-5)==".jpeg" or $strings=substr($userfile1_name,-5)==".docx" or $strings=substr($userfile1_name,-5)==".pptx" or $strings=substr($userfile1_name,-5)==".xlsx"){
								$strings=substr($userfile1_name,-5);
							}else{
								$strings=substr($userfile1_name,-4);
							}
							$strings = strtolower($strings);
							$name1=$_SESSION['ulogin']."file$pic1$strings";
							
							
							if(move_uploaded_file($fileupload,"web1/file/".$name1)){}
							
							return $name1 ; 
}


?>