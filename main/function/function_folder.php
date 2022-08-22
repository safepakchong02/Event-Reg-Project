<?php
// ########################## SELECT 1 STEP Where########################
function select_file($checkfile,$file){
   	if(strrpos($checkfile,".gif"))
		$data = '<img src="main_data/images/gif.gif" title="'.basename($file).'">';
	else if(strrpos($checkfile,".jpg"))
		$data = '<img src="main_data/images/jpg.gif" title="'.basename($file).'">';
	else if(strrpos($checkfile,".pdf"))
		$data = '<img src="main_data/images/pdf.gif" title="'.basename($file).'">';
	else if(strrpos($checkfile,".ppt"))
		$data = '<img src="main_data/images/ppt.gif" title="'.basename($file).'">';
	else if(strrpos($checkfile,".png") || strrpos($checkfile,".psd"))
		$data = '<img src="main_data/images/file_pic.gif" title="'.basename($file).'">';
	else if(strrpos($checkfile,".xls"))
		$data = '<img src="main_data/images/xls.gif" title="'.basename($file).'">';
	else
		$data = '<img src="main_data/images/default.gif" title="'.basename($file).'">';
	
	return $data;
	//mysql_close($handle);
}

// ########################## SELECT 1 STEP Where########################
function del_file($file){
	unlink($file);
}
?>