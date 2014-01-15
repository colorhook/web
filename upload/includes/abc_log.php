<?php

/**
 abc_log($path, $message);
*/
function abc_log($path, $message)
{
    $time = date('Y-m-d H:i:s');
	$log = $time . " [file] " . $path . "[message] " . $message;
	file_put_contents(__dirname . "/log.txt", $log, FILE_APPEND);
}

?>