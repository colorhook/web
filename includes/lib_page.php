<?php

/**include 'lib_page.php';

 * ECSHOP 页面维护的相关函数
 * ============================================================================
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

/**
 * 获得文章分类下的文章列表
 *
 * @access  public
 * @param   string      $page
 *
 * @return  *
 */
function get_page_data($page, $key = null)
{
  $file = ROOT_PATH . DATA_DIR . '/page_' . $page . '.json'; 
  if(file_exists($file)){
    $result = json_decode(file_get_contents($file), true);
  }
  if(!$key){
    return $result;
  }
  $keyArr = explode('.', $key);
  while($k = array_shift($keyArr)){
    $result = $result[$k];
    if(!$result){
      return null;
    }
    if(sizeof($keyArr) == 0){
      return $result;
    }
  }
}

/**
 * 获得指定分类下的文章总数
 *
 * @param   string      $page
 * @param   string      $key
 * @param   *           $value
 * @return  integer
 */
function set_page_data($page , $key, $value)
{
  $file = ROOT_PATH . DATA_DIR . '/page_' . $page . '.json'; 
  if(!file_exists($file)){
    return;
  }
  $data = json_decode(file_get_contents($file), true);
  $keyArr = explode('.', $key);
  $tmp = $data;
  while($k = array_shift($keyArr)){
    if(sizeof($keyArr) == 0){
      $tmp[$k] = $value;
    }else{
      if(!$tmp[$k]){
        $tmp[$k] = array();
      }
      $tmp = $tmp[$k];
    }
  }
  file_put_contents($file, @json_encode($tmp, JSON_PRETTY_PRINT));
}

?>