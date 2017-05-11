<?php
defined ( 'InShopNC' ) or exit ( 'Access Invalid!' );

/**
 * ******************************** 前台control父类 *********************************************
 */
class wxresponseControl extends wechatClass {
	private $options = array (
			'token' => 'tokenaccesskey', // 填写你设定的key
			'encodingaeskey' => 'encodingaeskey', // 填写加密用的EncodingAESKey
			'appid' => 'wxdk1234567890', // 填写高级调用功能的app id
			'appsecret' => 'xxxxxxxxxxxxxxxxxxx'  //填写高级调用功能的密钥
 		);

	public function __construct() {		
		global $config;
		var_dump($config);
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