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
    
    protected function lists($model_name,$where,$order='',$field='*'){
    	$model = Model($model_name);    	
    	$count = $model->where($where)->count();    	
    	$this->output_page_data($count);
    	$list = $model->where($where)->order($order)->select();
    	//dump($list); $model->_sql(); die;
    	Tpl::output('list',$list);
    	return $list;
    }
    
    protected function output_page_data($count,$return = false){
    	$page_count = ceil($count/$this->page);
    	pagecmd('setEachNum',$this->page);
    	pagecmd('setTotalNum',$count);    	 
    	//输出是否有下一页
    	$extend_data = array();
    	$extend_data['page_size']=$this->page;
    	$extend_data['list_count']=$count;
    	$current_page = intval($_GET['curpage']);
    	if($current_page <= 0) {
    		$current_page = 1;
    	}
    	if($current_page >= $page_count) {
    		$extend_data['hasmore'] = false;
    	} else {
    		$extend_data['hasmore'] = true;
    	}
    	$extend_data['page_total'] = $page_count;
    	if($return){
    		return $extend_data;
    	}else{
    		Tpl::output('page_data',$extend_data);
    	}
    }
}

class homeControl extends baseControl{
    
}



class memberControl extends homeControl{

	protected $member_id=0;
    protected $member_info = array();
	public function __construct(){
		parent::__construct();
		$this->getMemberInfo();
		$this->member_id=intval($this->member_info['member_id']);		
	}
    protected function getMemberInfo(){
    	$this->member_info=[];
    }
}

