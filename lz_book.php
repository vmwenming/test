<?php


session_start();
	header("contect-type:text/html;charset=utf-8");
	ini_set('max_execution_time','0');	//php 的执行时间不限制
	//set_time_limit(0);
	
	//执行函数
	$url="http://www.lzlib.com/pubquery/PubQueryCls.ASP?WCI=BookQuery&WCE=Form1&WCU";
//	$url="http://www.lzlib.com/pubquery/PubQueryCls.ASP?WCI=ShowNext&WCE=%2014%231";
	$cookie_file = tempnam ( './temp', 'cookie' );	//传入cookie
//	$a=1;
	get_search_html($url,$cookie_file);
	
	//根据url获取网页数据
	function curlGet($url){
		if(!$url){
			return false;
		}
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		$output = curl_exec($curl);
		curl_close($curl);
		return $output;
	}
	//提交检索,获取检索后的页面
	function  get_search_html($url,$cookie_file){
		/* var_dump($a);
		var_dump($url);
		var_dump($cookie_file); */
		//$url为提交之后的页面，也可以是action
		//	$url="http://www.lzlib.com/pubquery/PubQueryCls.ASP?WCI=BookQuery&WCE=Form1&WCU";
		//$pre_url为之前的展示页面
	//	$pre_url = "http://www.lzlib.com/pubquery/book.htm";
		
		$useragent = 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.2 (KHTML, like Gecko) Chrome/5.0.342.3 Safari/533.2';
		//$useragent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.82 Safari/537.36';
		
	$postfields = array();
	$postfields['ID_LIST_DB'] = '0000';						//那个图书馆
	$postfields['ID_CBO_LANGUAGE'] = "ALL";		//语种
	$postfields['ID_CBO_MATCHTYPE'] = "1";		
	$postfields['ID_CBO_BOOLTYPE'] = "1";		// 逻辑关系
	$postfields['ID_TXT_TITLE'] = "";					//提名
	$postfields['ID_TXT_AUTHOR'] = "";				// 作者
	$postfields['ID_TXT_PUBLISHER'] = "";					//出版社
	$postfields['ID_TXT_ISBN'] = "";					//isbn
	$postfields['ID_TXT_TOPIC'] = "";					//主题词
	$postfields['ID_TXT_CLASSID'] = "";					// 分类号
	
	$postfields['Submit'] = "检    索";
	
	//如果在查询的时候，账号和密码正确，而模拟查询的时候无效，就可以用这个函数转换一下	
	$postDataStr = http_build_query ( $postfields );
	
			$ch = curl_init ( $url );
			curl_setopt ( $ch, CURLOPT_HEADER, 0 );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_POST, 1 );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $postDataStr );
//					curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		curl_setopt ( $ch, CURLOPT_COOKIEJAR, $cookie_file );
		//	curl_setopt ( $ch, CURLOPT_COOKIEJAR, $cookie_file );

	$ret = curl_exec($ch); // Get result after login page.
	curl_close($ch) ;
	//echo $ret;exit;
		
//	echo $cookie_file;echo "<br>";
//	exit;
	//检索成功获取网页数据
	get__book_data($ret,$cookie_file,$url);
	}
	//检索成功获取网页数据
	function get__book_data($ret,$cookie_file,$url){
		$data=array();
	//	$ret="http://www.lzlib.com/pubquery/PubQueryCls.ASP?WCI=ShowNext&WCE=%2014%233";
		$next_url="";
		preg_match_all('/<A HREF="(.*?)">/is',$ret,$data);
		preg_match_all('/<a href = "(.*?)">.*?<\/a>/is',$ret,$next_url);
		//获取一页所有的url路径
		foreach ($data[1] as $key=>$val){
			$book_url="http://www.lzlib.com/pubquery/".$val;
			$book_data=curlGet($book_url);
			preg_match_all('/<table width="100%" border="0" cellspacing="0" cellpadding="0">(.*?)<\/table>/is',$book_data,$data_name);					//获取标题
			
			preg_match_all('/<td width="10%">.*?<\/td><td width="50%">(.*?)<\/td>/is',$data_name[1][0],$book_name_datas);
		/* 	preg_match_all('/<td width="10%">.*?<\/td><td width="50%"> <a href=".*?">(.*?)<\/a>/is',$data_name[1][0],$book_press);*/
			preg_match_all('/<td colspan="2">(.*?)<\/td><td colspan="2">(.*?)<\/td><td ALIGN="CENTER"><strong><font color="#008040">(.*?)<\/font><\/strong>.*?<\/td><td ALIGN="CENTER"><strong>(.*?)<\/strong> .*?<\/td><\/tr>/is',$book_data,$book_guancang);
				
			
			$book_name				=strip_tags($book_name_datas[1][0]);			//书名
			$book_author				=strip_tags($book_name_datas[1][1]);			//作者
			$book_press				=strip_tags($book_name_datas[1][2]);			//出版社
			$book_cat_num			=strip_tags($book_name_datas[1][4]);			//分类号
			$book_isbn					=strip_tags($book_name_datas[1][5]);			//isbn
			$book_send_num		=strip_tags($book_name_datas[1][7]);			//索取号
			$book_press_time		=strip_tags($book_name_datas[1][8]);			//出版时间
			$book_page				=strip_tags($book_name_datas[1][9]);			//页数
			$book_addr					=$book_guancang[1][0];								//馆藏地点
			$book_type					=$book_guancang[2][0];								//借阅方式
			$book_can_num			=$book_guancang[3][0];								//可借数量
			$book_have_num		=$book_guancang[4][0];								//馆藏数量
			
			$sql="insert into reader_account(book_name,book_author,book_press,book_cat_num,book_isbn,book_send_num,book_press_time,book_page,book_addr,book_type,book_can_num,book_have_num)
						values('".$book_name."','".$book_author."','".$book_press."','".$book_cat_num."','".$book_isbn."','".$book_send_num."','".$book_press_time."','".$book_page."','".$book_addr."','".$book_type."','".$book_can_num."','".$book_have_num."')";
	
		}
		//echo  $sql;exit;
		if(isset($next_url[1][0])){
			//获取下一页的路径
			http://www.lzlib.com/pubquery/PubQueryCls.ASP?WCI=ShowNext&WCE=%2014%231
			$next_url="http://www.lzlib.com/pubquery/".trim($next_url[1][0]);
			get_search_html_next($next_url,$cookie_file,$url);
		}	
	}
	
	// 带会话的采集
function  get_search_html_next($next_url,$cookie_file,$referer){
	echo $referer;echo "<br>";
	echo $next_url;echo "<br>";

	//echo file_get_contents($cookie_file) ;
	
///	echo $cookie_file;echo "<br>";

	$ch = curl_init ( $url );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_file );
		// curl_setopt ( $ch, CURLOPT_COOKIEJAR, $cookie_file );
		curl_setopt ( $ch, CURLOPT_REFERER, $referer );
		
		$data = curl_exec ( $ch );
		
		curl_close ( $ch );
		
		
		$ch = curl_init ( $next_url );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_COOKIEFILE, $cookie_file );
//		curl_setopt ( $ch, CURLOPT_COOKIEJAR, $cookie_file );
		curl_setopt ( $ch, CURLOPT_REFERER, $referer );
		
		$data_next = curl_exec ( $ch );
		echo $data_next;exit;
		curl_close ( $ch );
		
		
	//检索成功获取网页数据
	get__book_data($ret,$cookie_file);
	}
	
	