<?php
defined ( 'InShopNC' ) or exit ( 'Access Invalid!' );

/**
 * ******************************** 前台control父类 *********************************************
 */
class wxresponseControl extends wechatClass {
	public function __construct() {		
		global $config;
		parent::__construct ( $config['wechat'] );
		$this->valid ();
	}
	public function indexOp() {
		$type = $this->getRev ()->getRevType ();
		switch ($type) {
			case parent::MSGTYPE_TEXT :
				$this->text ( "hello, I'm wechat" )->reply ();
				exit ();
				break;
			case parent::MSGTYPE_EVENT :
				break;
			case parent::MSGTYPE_IMAGE :
				break;
			default :
				$this->text ( "help info" )->reply ();
		}
	}
}