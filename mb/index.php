<?php
define('APP_ID','mb');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t exists!');
if (!@include(BASE_CORE_PATH.'/comecore.php')) exit('comecore.php isn\'t exists!');

require(BASE_PATH.'/framework/function/function.php');
//引入control父类
require(BASE_PATH.'/control/control.php');
Base::run();
