<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
if (empty($_SESSION['user_id'])){
  ecs_header("Location: ./user.php\n");
  return;
}

$file = isset($_REQUEST['file']) ? $_REQUEST['file'] : "";

if(!$file){
 echo "File is required";
 return;
}
$file = preg_replace("/\//", "", $file);
$file = preg_replace("/\\\\/", "", $file);
$fullpath = ROOT_PATH . 'images/upload/File/' . $file;

if (file_exists($fullpath)){
	header('Content-Description: File Transfer');    
	header('Content-Type: application/octet-stream');    
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Content-Transfer-Encoding: binary');    
	header('Expires: 0');    
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');    
	header('Pragma: public');    
	header('Content-Length: ' . filesize($fullpath));    
	$stream = fopen(ROOT_PATH . 'images/upload/File/' . $file, "r");
	echo fread($stream, filesize($fullpath));
	fclose($file);
	exit();
}else{
  echo "File: $file not found";
}
?>