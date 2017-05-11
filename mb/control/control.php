<?php
/**
 * mobile父类 v3-b12
 *
 *
 * @好商城V4 (c) 2005-2016 33hao Inc.
 * @license    http://www.33hao.com
 * @link       交流群号：216611541
 * @since      好商城提供技术支持 授权请购买shopnc授权
 */

defined('InShopNC') or exit('Access Invalid!');

/********************************** 前台control父类 **********************************************/

class baseControl{

    //列表默认分页数
    protected $page = 5;


    public function __construct() {
        Language::read('mb');

        //分页数处理
        $page = intval($_GET['page']);
        if($page > 0) {
            $this->page = $page;
        }
    }
}

class homeControl extends baseControl{
    
}



class memberControl extends homeControl{

    protected $member_info = array();

    
}

