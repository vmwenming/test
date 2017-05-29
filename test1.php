<?php

header("Content-type: text/html; charset=utf-8");
	$width = 3555;
	$height = 2551;
	$zy1 = '亲爱的宝贝：';
	$zy2 = '名字是爸爸妈妈送给你的第一份礼物，希望你能了解它的寓意，深深地喜欢上它，并从这次神奇的冒险中学会勇敢，责任和爱！愿你永远天真，充满好奇心，相信总有奇遇会发生，愿你得到这个世界上最多最美好的爱和眷顾。';
	$zy3 = '永远爱你的爸爸和妈妈';

header('Content-type:image/jpeg');



$font = 'kzzt.ttf';    //字体
$font1 = 'fzzy.TTF';

$code = 'WAN';

//背景

$width = 3555;
$height = 2551;
$imgs = './gny_1_1_4';
_create_img_mzy_1($code,$imgs,$width,$height,$font);
exit;
if(count($code1) == 2){
	mzy2($code1,$code_pinyin1);
}elseif(count($code1) == 3){
	mzy3($code1,$code_pinyin1);
}elseif(count($code1) == 4){
	mzy4($code1,$code_pinyin1);
}
exit;
// 根据字符长度选择方法
if(count($code)==6){
	
	$imgs = 'C:/Users/Administrator/Desktop/sizi.jpg';
	_create_img_6($code,$code_pinyin,$imgs,$width,$height,$font,$font1);
}
if(count($code)==5){
	
	$imgs = 'C:/Users/Administrator/Desktop/sanzi.jpg';
	_create_img_5($code,$code_pinyin,$imgs,$width,$height,$font,$font1);
}
if(count($code)==4){
	
	$imgs = 'C:/Users/Administrator/Desktop/erzi.jpg';
	_create_img_4($code,$code_pinyin,$imgs,$width,$height,$font,$font1);
}
/**
 * 4个汉字的图片
 * @return [type] [description]
 */
function _create_img_syw($code,$imgs,$width,$height,$font){
	$codelen = count($code);

	$img = imagecreatefromstring(file_get_contents($imgs));
	
	//文字
	$_x = $width / $codelen;
	for ($i = 0; $i < $codelen; $i++) {
		if($i == 0){
			$fontcolor = imagecolorallocate($img, 255, 42, 19);//$img, 79, 42, 19
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,3,743,1262,$fontcolor, $font, $code[$i]);
	    	
		}elseif($i == 1){
			$fontcolor = imagecolorallocate($img, 255, 42, 19);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,230,0,1200,1212,$fontcolor, $font, $code[$i]);
	    	
		}elseif($i == 2){
			$fontcolor = imagecolorallocate($img, 79, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,205,0,1567,1184,$fontcolor, $font, $code[$i]);
	    	
		}


	}
	imagejpeg($img);
    imagedestroy($img);
}
/**
 * 4个汉字的图片
 * @return [type] [description]
 */
function _create_img_dyw($code,$imgs,$width,$height,$font){
	$codelen = count($code);

	$img = imagecreatefromstring(file_get_contents($imgs));
	
	//文字
	$_x = $width / $codelen;
	for ($i = 0; $i < $codelen; $i++) {
		if($i == 0){
			$fontcolor = imagecolorallocate($img, 255, 42, 19);//$img, 79, 42, 19
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,3,768,1262,$fontcolor, $font, $code[$i]);
	    	
		}elseif($i == 1){
			$fontcolor = imagecolorallocate($img, 255, 42, 19);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,230,0,1210,1212,$fontcolor, $font, $code[$i]);
	    	
		}elseif($i == 2){
			$fontcolor = imagecolorallocate($img, 79, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,138,0,1597,1164,$fontcolor, $font, $code[$i]);
	    	
		}


	}
	imagejpeg($img);
    imagedestroy($img);
}
/**
 * 4个汉字的图片
 * @return [type] [description]
 */
function _create_img_6($code,$code_pinyin,$imgs,$width,$height,$font,$font1){
	$codelen = count($code);

	$img = imagecreatefromstring(file_get_contents($imgs));
	
	//文字
	$_x = $width / $codelen;
	for ($i = 0; $i < $codelen; $i++) {
		if($i == 0){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);//$img, 79, 42, 19
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,3,583,1132,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0, 756, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 1){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,230,0,1020,1095,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0, 1116, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 2){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,6,1317,1134,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0, 1489, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 3){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,2,1752,1120,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0, 1874, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 4){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,-6,2147,1110,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0,2293, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 5){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,340,0,2601,1127,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,47,0, 2759, 1254,$fontcolor,$font1, $code_pinyin[$i]);
		}


	}
	imagejpeg($img);
    imagedestroy($img);
}
/**
 * 3个汉字的图片
 * @return [type] [description]
 */
function _create_img_5($code,$code_pinyin,$imgs,$width,$height,$font,$font1){
	$codelen = count($code);

	$img = imagecreatefromstring(file_get_contents($imgs));
	
	//文字
	$_x = $width / $codelen;
	for ($i = 0; $i < $codelen; $i++) {
		if($i == 0){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);//$img, 79, 42, 19
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,3,758,1132,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 942, 1260,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 1){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,240,0,1222,1092,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 1322, 1260,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 2){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,6,1537,1134,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 1667, 1258,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 3){
			$fontcolor = imagecolorallocate($img, 232, 56, 13);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,2,1950,1120,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 2094, 1258,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 4){
			$fontcolor = imagecolorallocate($img, 0, 255, 255);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,-16,2370,1066,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0,2528, 1258,$fontcolor,$font1, $code_pinyin[$i]);
		}


	}
	imagejpeg($img);
    imagedestroy($img);
}
/**
 * 2个汉字的图片
 * @return [type] [description]
 */
function _create_img_4($code,$code_pinyin,$imgs,$width,$height,$font,$font1){
	$codelen = count($code);

	$img = imagecreatefromstring(file_get_contents($imgs));
	
	//文字
	$_x = $width / $codelen;
	for ($i = 0; $i < $codelen; $i++) {
		if($i == 0){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);//$img, 79, 42, 19
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,3,952,1132,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 1135, 1260,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 1){
			$fontcolor = imagecolorallocate($img, 79, 42, 19);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,240,0,1415,1092,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 1515, 1260,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 2){
			$fontcolor = imagecolorallocate($img, 0, 255, 255);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,6,1730,1134,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 1860, 1258,$fontcolor,$font1, $code_pinyin[$i]);
		}elseif($i == 3){
			$fontcolor = imagecolorallocate($img, 0, 255, 255);
			// 图片，字体，角度，坐标(左下角大致)，颜色，字体，字
	    	imagefttext($img,360,2,2140,1120,$fontcolor, $font, $code[$i]);
	    	imagefttext($img,50,0, 2287, 1258,$fontcolor,$font1, $code_pinyin[$i]);
		}


	}
	imagejpeg($img);
    imagedestroy($img);
}
/**
 * 扉页
 * @return [type] [description]
 */
function zengyu($zy1 = '',$zy2 = '',$zy3 = ''){
	
	

	$imgs = 'C:/Users/Administrator/Desktop/jiyu.jpg';
	$img = imagecreatefromstring(file_get_contents($imgs));
	$font = 'xwz.ttf';
	$fontcolor = imagecolorallocate($img, 255, 0, 0);
	$zy2 = autowrap(25, 0,$font, $zy2, 1000); // 自动换行处理

	imagefttext($img,50,0,640,1336,$fontcolor, $font, $zy1);
	imagefttext($img,50,0,780,1586,$fontcolor, $font, $zy2);
	imagefttext($img,50.5,0,2195,2200,$fontcolor, $font, $zy3);


	imagejpeg($img);
    imagedestroy($img);
}
// 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
function autowrap($fontsize, $angle, $fontface,$string, $width) {
	$content = '';
	
 	// 将字符串拆分成一个个单字 保存到数组 letter 中
 	for ($i=0;$i<mb_strlen($string)/3;$i++) {
  		$letter[] = mb_substr($string, $i,1,'utf-8');
 	}
 
 	foreach ($letter as $l) {
  		$teststr = $content." ".$l;
  		$testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
  		// 判断拼接后的字符串是否超过预设的宽度
  		if (($testbox[2] > $width) && ($content !== "")) {
   			$content .= "\n";
  		}
  			$content .= $l;
 	}
 	$rows = array(
 		'widths'=> $testbox[2],
 		'content'=>$content
 		);
 	return $rows;
}

function mzy2($name,$pinyin){
	$font = 'klkz.ttf';
	$imgs = 'C:/Users/Administrator/Desktop/mzy2.jpg';
	$img = imagecreatefromstring(file_get_contents($imgs));
	$fontcolor = imagecolorallocate($img, 250, 0, 0);
	$codelen = count($name);
	for($i = 0; $i<$codelen;$i++){
		if($i == 0){
			imagefttext($img,188,0,1878,2240,$fontcolor, $font, $name[$i]);
		    imagefttext($img,65,0,1820,1945,$fontcolor, $font, $pinyin[$i]);
		}elseif($i == 1){
			imagefttext($img,188,0,2485,2240,$fontcolor, $font, $name[$i]);
		    imagefttext($img,65,0,2445,1945,$fontcolor, $font, $pinyin[$i]);
		}

	}


	imagejpeg($img);
    imagedestroy($img);

}
function mzy3($name,$pinyin){
	$font = 'klkz.ttf';
	$imgs = 'C:/Users/Administrator/Desktop/mzy3.jpg';
	$img = imagecreatefromstring(file_get_contents($imgs));
	$fontcolor = imagecolorallocate($img, 250, 0, 0);
	$codelen = count($name);
	for($i = 0; $i<$codelen;$i++){
		if($i == 0){
			imagefttext($img,188,0,1473,2240,$fontcolor, $font, $name[$i]);
		    imagefttext($img,65,0,1445,1945,$fontcolor, $font, $pinyin[$i]);
		}elseif($i == 1){
			imagefttext($img,188,0,2015,2240,$fontcolor, $font, $name[$i]);
		    imagefttext($img,65,0,1965,1945,$fontcolor, $font, $pinyin[$i]);
		}elseif($i == 2){
			imagefttext($img,188,0,2535,2240,$fontcolor, $font, $name[$i]);
		    imagefttext($img,65,0,2505,1945,$fontcolor, $font, $pinyin[$i]);
		}

	}


	imagejpeg($img);
    imagedestroy($img);

}
function _create_img_mzy_1($name,$pinyin){
	$font = 'klkz.ttf';
	$imgs = 'C:/Users/Administrator/Desktop/mzy_1.jpg';
	$img = imagecreatefromstring(file_get_contents($imgs));
	$fontcolor = imagecolorallocate($img, 49, 0, 0);
	$codelen = count($name);
	$a = autowrap(155,0,$font,$name,1000);
	imagefttext($img,155,0,1901-$a['widths']/2,2270,$fontcolor, $font, $name);


	$a = imagejpeg($img);
	img_create_small($a,600,400,'1asda.jpg');
	
    imagedestroy($img);

}












