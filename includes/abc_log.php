<?php

/**
 abc_log($path, $message);
*/
function abc_log($path, $message)
{
  $time = date('Y-m-d H:i:s');
	$log = $time . " [file] " . $path . " [message] " . $message . PHP_EOL;
	//file_put_contents(ROOT_PATH . "includes/log.txt", $log, FILE_APPEND);
}

?>