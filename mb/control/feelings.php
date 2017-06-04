<?php
defined ( 'InShopNC' ) or exit ( 'Access Invalid!' );

/**
 * ******************************** 前台control父类 *********************************************
 */
class feelingsControl extends memberControl {
	
	public function indexOp() {		
		$list = $this->lists('feelings_list', ['member_id'=>$this->member_id],'fl_id desc');
		foreach ($list as &$li){
			$li['fl_type_name']=$this->get_feelings_type($li['fl_type']);
		}
		Tpl::output('list',$list);
		Tpl::display('feelings_list');		
	}
	
	public function saveOp(){
		if(chksubmit()){
			$fl_name=trim($_POST['fl_name']);
			if(!$fl_name){
				showMessage('请填写事件名称');
				
			}
			$fl_type=intval($_POST['fl_type']);
			if($fl_type<=0){
				showMessage('请选择事件类型');
			}
			$fl_type_name='';
			if($fl_type==100){
				$fl_type_name=trim($_POST['fl_type_name']);
				if($fl_type_name){
					showMessage('请填写事件类型名称');						
				}
			}
			
			$fl_date=trim($_POST['fl_date']);
			if(strtotime($fl_date)<strtotime('-90 days')){
				showMessage('只能添加三个月之内的事件');
			}
			$fl_mark=trim($_POST['fl_mark']);
			
			$fl_id = intval($_POST['fl_id']);
			if($fl_id>0){
				$result = Model('feelings_list')->where(['fl_id'=>$fl_id])->update(['fl_name'=>$fl_name,'fl_type'=>$fl_type,'fl_type_name'=>$fl_type_name,'fl_date'=>$fl_date,'fl_mark'=>$fl_mark]);
				if($result){
					showMessage('修改成功','index.php?act=feelings');
				}else{
					showMessage('修改事件失败');				
				}
			}else{
				$result = Model('feelings_list')->insert(['fl_name'=>$fl_name,'fl_type'=>$fl_type,'fl_type_name'=>$fl_type_name,'fl_date'=>$fl_date,'fl_mark'=>$fl_mark,'create_time'=>TIMESTAMP]);
				if($result){
					showMessage('新增事件成功','index.php?act=feelings');
				}else{
					showMessage('新增事件失败');				
				}
			}			
		}else{
			$fl_id = intval($_GET['fl_id']);
			if($fl_id>0){
				$feelings_info = Model('feelings_list')->where(['fl_id'=>$fl_id])->find();
				Tpl::output('info',$feelings_info);
				Tpl::output('title','修改事件');
			}else{
				Tpl::output('title','新增事件');				
			}
			Tpl::output('list',$this->get_feelings_type(0,true));
			Tpl::display('feelings_save');
		}
	}

	private function get_feelings_type($type,$all=false){
		$list=[
			1=>'婚嫁',
			2=>'生子',
			3=>'生日',
			4=>'白事',
			5=>'建新房',
			6=>'升迁',
			7=>'上大学',
			100=>'其他'			
		
		];
		
		if($all){
			return $list;
		}		
		return array_key_exists($type, $list)?$list[$type]:'';		
	}
}