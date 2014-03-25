<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
if (empty($_SESSION['user_id'])){
  return ecs_header("Location: ./user.php\n");
}

$file = $_REQUEST['file'];
$file = preg_replace("/[\/\\]/", "", $file);
$file = ROOT_PATH . 'images/upload/File/' . $file;

header('Content-Description: File Transfer');    
header('Content-Type: application/octet-stream');    
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');    
header('Expires: 0');    
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');    
header('Pragma: public');    
header('Content-Length: ' . filesize($file));    
ob_clean();
flush();    
readfile($file);
?>