<?php

/**
 * ECSHOP 商品管理程序
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: goods.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/lib_page.php');
/*------------------------------------------------------ */
//-- 显示首页
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'home')
{   
    $smarty->assign('ur_here',             $_LANG['01_page_home']);
    $smarty->assign('data',        get_page_data('home'));
    $smarty->display('page_home.htm');
   
}
else if($_REQUEST['act'] == 'save')
{
  $page = $_REQUEST['page'];
  $data = $_REQUEST['data'];
  $key = $_REQUEST['key'];
  $result = array();
  try{
    if($key == 'floors'){
	  $data['enabled'] = $data['enabled'] == 'true';
      $floor = get_page_data($page, $key);
      $floor[$_REQUEST['index']] = $data;
      set_page_data($page, $key, $floor);
    }else{
      set_page_data($page, $key, $data);
    }
    $result['success'] = true;
  }catch(Exception $e){
    $result['success'] = false;
  }
  echo json_encode($result);
}
?>