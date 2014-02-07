<?php


//update or create a repository
function updateGit(){
  $str = "cd /var/www/git/web && git pull 2>&1";
  return shell_exec($str);
}

//从gitlab过来的数据
$content = file_get_contents('php://input');

if($content){
	$data = json_decode($content);
	$repo = $data->repository;
	echo updateGit();
}else{
	echo updateGit();
}
?>
