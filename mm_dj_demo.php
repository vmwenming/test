

<?php

//$url = "http://ospd.mmarket.com:8089/wabp/pay.action?apco=20604&aptid=100000&aptrid=dj_140919433622354&bu=aHR0cDovL3d3dy5rYW5zaHUuY29tP3N0YXRlPXN1Y2Mmb3JkZXJpZD1kal8xNDA5MTk0MzM2MjIzNTQmY29yZGVyaWQ9MTAwMDAwJnhvcmRlcmlkPTE0MDkxOTQzMjI=&ch=20567&ex=18000&mid=IBOIIKAFGBBGOC&sin=fmemy&xid=null&sign=MCwCFFQDILx2XleZTtjQJVfSLEySSO02AhRgKjqc7OLAjeB4V7cwFYe%2BZy4lzw%3D%3D";
//$content = HttpGet($url);
//$listNumberStr = '/value="(.*?)"/';
//preg_match_all($listNumberStr, $content, $list);
//$contentList = $list[1];
//$post_param = array(
//    'ch' => $contentList[4],
//    'ex' => $contentList[5],
//    'inner_id' => $contentList[0],
//    'inputMobile' => $contentList[8],
//    'random' => $contentList[7],
//);
//$sms_url = "http://ospd.mmarket.com:8089/wabp/wabpWapOrder!sendSmsCode.action";
//$sms_res = HttpGet($sms_url, $post_param);
//print_r($sms_res);

function HttpGet($url, $post_data = array()) {

    $header[] = 'Connection: Keep-Alive';
    $header[] = 'Content-Type: application/x-www-form-urlencoded';
    $header[] = 'Accept-Encoding: gzip, deflate';
    $header[] = 'Accept-Language: zh-CN,zh;q=0.9,en;q=0.8';
    $header[] = 'Accept: text/html, application/xml;q=0.9, application/xhtml+xml, image/png, image/webp, image/jpeg, image/gif, image/x-xbitmap, */*;q=0.1';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $agents = array(
        'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7A341 Safari/528.16 FirePHP/0.7.4'
    );
    $agent_count = count($agents);
    $user_agent = $agents[rand(0, $agent_count - 1)];
    curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $body = curl_exec($ch);
    curl_close($ch);
    return $body;
}



//----------------------------------------------------------------------------------------------------------------------
//die;
$code = 20568; //web 20602  //wap 20604   //web 10元 20568  //wap 20616 5  //wap  20588 10 
$channel = 100008;
$orderid = time();
//$mobile = 13521753998;  //北京
//$mobile = 13733984012; //河南
//$mobile = 15049893197; //内蒙古
//$mobile = 14718993853; //拉萨
$mobile = 13699485718; //辽宁

$backurl = base64_encode("http://www.kanshu.com");
$ckey = "9hAbMK2a";   //100000
//$ckey = "iPJvLDwS"; //100003
$sign = md5($code . $channel . $orderid . $mobile . $ckey);

//GET 
$url = "http://wap.kanshu.com:8080/fee/mmchannel?code={$code}&channel_id={$channel}&orderid={$orderid}&mobile={$mobile}&backurl={$backurl}&sign={$sign}";
//echo $url;
//exit; 
//header("Location: http://wap.kanshu.com:8080/fee/mmchannel?code={$code}&channel_id={$channel}&orderid={$orderid}&mobile={$mobile}&backurl={$backurl}&sign={$sign}");
?>
文明用这个150<br>
<form method="post" action="http://wap.kanshu.com:8080/fee/mmchannel">
    code:<input type="text" name="code" value="<?php echo $code ?>"><br>
    channel:<input type="text" name="channel_id" value="<?php echo $channel ?>"><br>
    orderid:<input type="text" name="orderid" value="<?php echo $orderid ?>"><br>
    mobile:<input type="text" name="mobile" value="<?php echo $mobile ?>"><br>
    backurl:<input type="text" name="backurl" value="<?php echo $backurl ?>"><br>
    sign:<input type="text" name="sign" value="<?php echo $sign ?>"><br>
    <input type="submit" value="submit">
</form>
p.kanshu.com<br>
<form method="post" action="http://p.kanshu.com/pay/mmpay/create">
    code:<input type="text" name="code" value="<?php echo $code ?>"><br>
    channel:<input type="text" name="channel_id" value="<?php echo $channel ?>"><br>
    orderid:<input type="text" name="orderid" value="<?php echo $orderid ?>"><br>
    mobile:<input type="text" name="mobile" value="<?php echo $mobile ?>"><br>
    backurl:<input type="text" name="backurl" value="<?php echo $backurl ?>"><br>
    sign:<input type="text" name="sign" value="<?php echo $sign ?>"><br>
    <input type="submit" value="submit">
</form>

localhost<br>
<form method="post" action="http://liug.p.kanshu.com/index.php/pay/mmpay/create">
    code:<input type="text" name="code" value="<?php echo $code ?>"><br>
    channel:<input type="text" name="channel_id" value="<?php echo $channel ?>"><br>
    orderid:<input type="text" name="orderid" value="<?php echo $orderid ?>"><br>
    mobile:<input type="text" name="mobile" value="<?php echo $mobile ?>"><br>
    backurl:<input type="text" name="backurl" value="<?php echo $backurl ?>"><br>
    sign:<input type="text" name="sign" value="<?php echo $sign ?>"><br>
    <input type="submit" value="submit">
</form>
 UPDATE `platform`.`publish_channel_book` SET `is_first_published` = '0' WHERE `publish_channel_book`.`channel_book_id` =139064 LIMIT 1 ;
 
 
 余思芹
 513027194509272326