<?php
############### check ขนาดของ folder
function foldersize($path)
{
  $size = 0;
  if( $dir = @opendir( $path )) {
    while(($file = readdir($dir)) !== false ) {
      if( is_dir( "$path/$file" ) && $file != '.' && $file != '..' ) {
        $size += foldersize( "$path/$file" );
      }
      if( is_file( "$path/$file" )) {
        $size += filesize( "$path/$file" );
      }
    }
    closedir($dir);
  }
  $size = $size/(1048576);
  return $size;
}
?>