
<?php
//$str = 12+27+7+15-5-2 ;
//echo $str ;
//exit;

$xml = '<xml><body><![CDATA[测试支付]]></body>
<mch_create_ip><![CDATA[127.0.0.1]]></mch_create_ip>
<mch_id><![CDATA[001075552111006]]></mch_id>
<nonce_str><![CDATA[1409196838]]></nonce_str>
<out_trade_no><![CDATA[1409196838]]></out_trade_no>
</xml>' ;
$xml = simplexml_load_string($xml);
//print_r($xml) ;exit;
$data['body'] = $xml->body.'' ;
$data['nonce_str'] = $xml->nonce_str.'' ;
$data['mch_create_ip'] = $xml->mch_create_ip.'' ;
$data['mch_id'] = $xml->mch_id.'' ;

$data['out_trade_no'] = trim($xml->out_trade_no.'') ;
$key = '9d101c97883hj44895ki34jbd36567nj44j' ;
ksort($data) ;
$urlquery = urldecode(http_build_query($data)) ;
$urlquery = $urlquery.'&key='.$key ;

//body=测试支付&mch_create_ip=127.0.0.1&mch_id=001075552111006&nonce_str=1409196838&out_trade_no=1409196838 &key=9d101c97883hj44895ki34jbd36567nj44j
  //body=测试支付&mch_create_ip=127.0.0.1&mch_id=001075552111006&nonce_str=1409196838&out_trade_no=1409196838&key=9d101c97883hj44895ki34jbd36567nj44j[Finished in 0.1s]
  //body=测试支付&mch_create_ip=127.0.0.1&mch_id=001075552111006&nonce_str=1409196838&out_trade_no=1409196838&key=9d101c97883hj44895ki34jbd36567nj44j[Finished in 0.1s]
//echo $urlquery ;

$sign = strtoupper(md5($urlquery)) ;

$data['sign'] = $sign ;

function isTenpaySign($data,$key){
  $signPars = "";
    ksort($data);
    foreach($data as $k => $v) {
      if("sign" != $k && "" != $v) {
        $signPars .= $k . "=" . $v . "&";
      }
    }
    $signPars .= "key=" . $key;
    
    $sign = strtolower(md5($signPars));
    
    $tenpaySign = strtolower($this->getParameter("sign"));
        
    //debug信息
    $this->_setDebugInfo($signPars . " => sign:" . $sign .
        " tenpaySign:" . $this->getParameter("sign"));
    
    return $sign == $tenpaySign;
}

//exit;
echo $urlquery ;exit;
$sign = strtoupper(md5($urlquery)) ;
echo $sign ;
exit;
echo $urlquery ;exit;
print_r($data) ;exit;


$url = "http://qingyuyuedu.buerting.com/qyd" ;
$data = array() ;
$data['total_fee'] = 100;//价格,以分为单位
$data['mch_id'] = 199550044896;//商户号；必传
$data['body'] = '金币充值'.$data['total_fee'].'个';//金币充值
$data['orderNo'] = time();//订单号
$data['callbackUrl'] = time();//前端跳转
$data['backEndUrl'] = 'http://www.baidu.com';//后台异步通知
$data['cancelpayUrl'] = 'http://www.baidu.com';//取消支付或者支付失败之后跳转的页面
$data['openid'] = 'openid' ;
$searchQuery = http_build_query($data) ;

$searchQuery = urlencode($searchQuery) ;
$url = $url.'?'.$searchQuery ;
$arr = getData($url) ;
print_r($arr) ;
echo $url ;exit;

/*
$data = array() ;
$data['app_key'] = "8569786663";
$data['key'] = "9725f0e49b1b5df368197094d685fcaf";
$data['book_channel_id'] = "1";
$data['random_str'] = "6dd562c3ae9ccac58e12c23705dfa171";
$data['token'] = md5($data['book_channel_id'].'#'.$data['key'].'#'.$data['random_str']) ;
$url = 'http://open.shishang168.cn/hezuo/book/replaceBook' ;
$res = postData($url,$data) ;
print_r($res) ;
 



//获取token
//http://m.chunnuanhh.com/book/content?bid=2003834&cid=6425198    
//http://m.chunnuanhh.com/book/content?bid=2003834&cid=6425199&channel_id=1&bookid=2003834
$url = 'http%253A%252F%252Fhetao.shishang168.cn%252Fuser%252Findex%253Fsid%253D30bf8ecd3d6727538ea71be30161db01' ;
echo urldecode($url) ;
exit;
echo makeApptoken('b7b7z2f01203') ;
exit;


 function makeApptoken($appKey)
    {   
        $token = '';
        $day = date('Ymd');
        $token = substr($appKey, -4);
        $token = md5($token.$day);
        $token = substr($token,0,12);
    
        return $token;
    }

$img = new ValidateCode() ;
$img->doimg();  
echo phpinfo() ;exit;
captcha() ;
exit;
function captcha($width = "72", $height = "28")
    {
       // header('Content-type:image/png');
    
        $codelen = 4;   //验证码位数
        $fontsize = 20; //字体大小
        $font = './default.ttf';
    
        $code = 1111;
    
        //记录session
        $_SESSION['ip_captcha'] = $code;
        
    
        //背景
        $img = imagecreatetruecolor($width, $height);
        $color = imagecolorallocate($img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
        imagefilledrectangle($img, 0, $height, $width, 0, $color);
    
        //线条
        for ($i=0;$i<6;$i++) {
            $color = imagecolorallocate($img, mt_rand(0,156), mt_rand(0,156), mt_rand(0,156));
            imageline($img, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), $color);
        }
    
        //雪花
        for ($i=0;$i<100;$i++) {
            $color = imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
            imagestring($img, mt_rand(1,5), mt_rand(0, $width), mt_rand(0, $height), '*', $color);
        }
    
        //文字
        $_x = $width / $codelen;
        for ($i=0; $i<$codelen; $i++) {
            $fontcolor = imagecolorallocate($img, mt_rand(0,156),mt_rand(0,156), mt_rand(0,156));
            imagettftext($img, $fontsize, mt_rand(-30,30), $_x*$i+mt_rand(1,5), $height / 1.4, $fontcolor, $font, $code[$i]);
        }
    
        imagepng($img);
        imagedestroy($img);
    }



echo urldecode('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxea6801d732579958&redirect_uri=http%3A%2F%2Fpay.lanrenyuehui.com%2Fwxgzhpay%2Fwxgzh_order%3Fbody%3D%E8%B4%A6%E6%88%B7%E5%85%85%E5%80%BC%26total_fee%3D10%26para_id%3D10472%26app_id%3D10326%26notify_url%3Dhttp%3A%2F%2Fopen.chunnuanhh.com%2Fyd%2Fpay%2Fwechath5sync%26callback_url%3Dhttp%3A%2F%2Fm.chunnuanhh.com%2Fbook%2Fcontent%3Fbid%3D2000017%26cid%3D33936%26sub_openid%3Do5KFBxK1tZ8Zpjy2VLqG2IpI5IfA%26order_no%3D20170409173fRMFGz6%26attach%3Dwechath5&response_type=code&scope=snsapi_base&state=1#wechat_redirect') ;
exit;
$url = "http://api.icartoons.cn/v1/weborder/cancel_order.json" ;
$postData = array() ;
$postData['goodsn']= 'S0005X' ;
$postData['phoneno']= '18980960849' ;
$postData['timestamp'] = time() ;
$sign = 'goodsn='.$postData['goodsn'].'phoneno='.$postData['phoneno'].'timestamp='.$postData['timestamp'].'dm_open_3785676450'.'66be7c2dfd7f2bc82ab41155143912a2' ;
echo $sign."\n" ;
$sign = md5($sign) ;
$postData['sig'] = $sign ;
$res = postData($url,$postData) ;
print_r($res) ;
exit;
echo phpinfo() ;
exit;
$startTime = strtotime(date('Y-m-d').' 00:00:00')-86400*5 ;
$startDate = date('Y-m-d H:i:s',$startTime) ;
echo $startDate ;exit;
exit ;
*/
$app_id = '84f427c05e6fccf7b6e1659959008f11' ;
$url = 'http://api.kongdm.com/token/'.$app_id.'/'.md5($app_id.date('Ymd')) ;
//echo $url."\n" ;
$res = getData($url,array()) ;
$resArr = array() ;
print_r($res) ; 
exit;
if($res['http_code']==200){
	$resArr = json_decode($res['http_body'],true) ;
	$token = $resArr['data']['token'] ;
	
}

echo $token ;

exit;

function getData($request_url, $get_data = array()) {
    $query = '';
    
    if (!empty($get_data) && is_array($get_data))
    {
        $query .= http_build_query($get_data);
    }
    
    if (!empty($query))
    {
        if (strpos($request_url, '?') === FALSE)
        {
            $request_url.='?' . $query;
        } else
        {
            $request_url .= $query;
        }
    }
    
    $curl = curl_init();
    $header = array() ;
   // $header[] = 'X-API-APP-TOKEN:84f427c05e6fccf7b6e1659959008f11';
   // $header[] = 'API-RemoteIP:127.0.0.1';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 

    curl_setopt($curl, CURLOPT_URL, $request_url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 300);
    $data = curl_exec($curl);
    $info = curl_getinfo($curl);
    $http_code = $info ['http_code'];

    return array('http_code' => $http_code, 'http_body' => $data);
 }



function postData($request_url, $post_data = array()){
    $post_data = http_build_query($post_data);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_URL, $request_url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $header = array() ;
    $header[] = 'app_id:dm_open_3785676450';
   // $header[] = 'API-RemoteIP:127.0.0.1';
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 300);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    
    $data = curl_exec($curl);
    $info = curl_getinfo($curl);
    $http_code = $info ['http_code'];
    
    return array('http_code' => $http_code, 'http_body' => $data);
}


$str ='<?xml version="1.0" encoding="UTF-8"?><RequestBody><Sign>pvYE0jW2bdBS6/Aex1Hk1VyR2aoBXVr INtsdVaaLvLQkhVOgNZb7jGp6zWLi7uE2nwuzaPCdmmG
8StxezL2bg==</Sign><Behavior>order</Behavior><Trade_status>0</Trade_status><Trade_no>03171445430400467275</Trade_no><Buyer_id>13372001306</Buyer_id><Product_id>B002ie</Product_id><Product_name>酷阅充值0.1元</Product_name><Price>0.1</Price><App_id>dm_open_702620695</App_id><Extension>131000Sl000001B002ie001</Extension></RequestBody>
' ;
$xmlArr = simplexml_load_string ( $str );
echo $xmlArr->Trade_no ;
print_r($xmlArr) ;

exit;
require './phpmailer/class.smtp.php'; 
require './phpmailer/class.phpmailer.php'; 
try { 
$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
$mail->SMTPAuth = true; //开启认证
$mail->Port = 465;
$mail->Host = "smtp.163.com";
$mail->Username = "13366720031@163.com";
$mail->Password = "fyn958598";
$mail->SMTPSecure = "ssl";
//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示

$mail->From = "13366720031@163.com";
$mail->FromName = "wenming";
$to = "wenming@kanshu.com";
$mail->AddAddress($to);
$mail->Subject = "phpmailer测试标题";
$mail->Body = "<h1>phpmail演示</h1>这是php点点通（<font color=red>www.phpddt.com</font>）对phpmailer的测试内容";
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
$mail->WordWrap = 80; // 设置每行字符串的长度
//$mail->AddAttachment("f:/test.png"); //可以添加附件
$mail->IsHTML(true);
$mail->Send();
echo '邮件已发送';
} catch (phpmailerException $e) {
echo "邮件发送失败：".$e->errorMessage();
} 

exit;


   
      
  


//验证码类
class ValidateCode {
 private $charset = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';//随机因子
 private $code;//验证码
 private $codelen = 4;//验证码长度
 private $width = 130;//宽度
 private $height = 50;//高度
 private $img;//图形资源句柄
 private $font;//指定的字体
 private $fontsize = 20;//指定字体大小
 private $fontcolor;//指定字体颜色
 //构造方法初始化
 public function __construct() {
         //$font = './default.ttf';
  $this->font = dirname(__FILE__).'/font/default.ttf';//注意字体路径要写对，否则显示不了图片
 }
 //生成随机码
 private function createCode() {
  $_len = strlen($this->charset)-1;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->code .= $this->charset[mt_rand(0,$_len)];
  }
 }
 //生成背景
 private function createBg() {
  $this->img = imagecreatetruecolor($this->width, $this->height);
  $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
  imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
 }
 //生成文字
 private function createFont() {
  $_x = $this->width / $this->codelen;
  for ($i=0;$i<$this->codelen;$i++) {
   $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
   imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
  }
 }
 //生成线条、雪花
 private function createLine() {
  //线条
  for ($i=0;$i<6;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
   imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
  }
  //雪花
  for ($i=0;$i<100;$i++) {
   $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
   imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
  }
 }
 //输出
 private function outPut() {
  header('Content-type:image/png');
  imagepng($this->img);
  imagedestroy($this->img);
 }
 //对外生成
 public function doimg() {
  $this->createBg();
  $this->createCode();
  $this->createLine();
  $this->createFont();
  $this->outPut();
 }
 //获取验证码
 public function getCode() {
  return strtolower($this->code);
 }
}