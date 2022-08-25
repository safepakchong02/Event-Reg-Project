<?php
function module($path,$mod) {
 	$path="main/module/".$path."/".$mod.".php";	

	if (file_exists($path)) {
		return	$path;								
	} else {
		$path = "main/module/event/dashboard.php";
		return	$path;	
	}
}

function export($data){
	$name_out = explode(",",$data);
	return	$name_out;	
}



function cutStr($str,$maxChars='',$holder=''){

    if (strlen($str) > $maxChars){
   		$str = iconv_substr($str, 0, $maxChars,"UTF-8"). $holder;
 	} 
  	return $str;
} 
	
function chk_ad_login(){
	if($_SESSION['login'] == ''&& $_SESSION['level'] !='admin'){	
		print "<meta http-equiv=refresh content='0;URL=index.php'>";
		//break;
	}
}

function chk_get_url($get_url){
	
   if($get_url != ''){
   		$url_use = $get_url;
		
   }else{
   		
   }
   return $url_use;
}

function POST_GET_DATA($_chk,$data_false){
	
	if($_chk != ""){	     
		$data_return = trim($_chk);		
	}else{
		$data_return=$data_false;	
	}
   	 return $data_return;
}
?>