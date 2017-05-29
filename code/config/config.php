<?php
class Config{
    private $cfg = array(
        'url'=>'https://pay.swiftpass.cn/pay/gateway',
        'mchId'=>'103520004720',
        'key'=>'0dcf2015dba7498b52fc2bd571e56a99',
        'version'=>'1.0'
       );
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>