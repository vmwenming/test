<?php
class Config{
    private $cfg = array(
        'url'=>'https://pay.swiftpass.cn/pay/gateway',
        'mchId'=>'102541163422',
        'key'=>'e3c66696eb27e3f7044a0f4f9655555c',
        'version'=>'1.0'
       );
    
/*
        private $cfg_key = "0dcf2015dba7498b52fc2bd571e56a99";
    private $cfg_mchId = "103520004720";
    */
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>