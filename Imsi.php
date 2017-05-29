<?php
class Moby_Accsvr_Model_Util_Imsi {
	
	private $CM_00  = "46000";
	private $CM_02  = "46002";
	private $CM_07  = "46007";
	
	
	private $CM_00_ALL = "13";
	private $CM_02_0 = "134";
	private $CM_02_1 = "151";
	private $CM_02_2 = "152";
	private $CM_02_3 = "150";
	private $CM_02_5 = "183"; // alex add 20140814
	private $CM_02_6 = "182";
	private $CM_02_7 = "187";
	private $CM_02_8 = "158";
	private $CM_02_9 = "159";
	
	private $CM_07_7 = "157";
	private $CM_07_8 = "188";
	private $CM_07_9 = "147";
	
	private $CU_01  = "46001";
	private $CU_06  = "46006"; // alex add 20140814
	
	
	private $CU_01_0 = "130";
	private $CU_01_1 = "130"; // alex add 20140814
	private $CU_01_2 = "132";
	private $CU_01_3 = "156";
	private $CU_01_4 = "155";
	private $CU_01_5 = "185"; // alex add 20140814
	private $CU_01_6 = "186";
	private $CU_01_7 = "145";
	private $CU_01_9 = "131";
	
	private $CT_03  = "46003";
	private $CT_05  = "46005"; // alex add 20140814
	private $CT_20404  = "20404"; // alex add 20140814 国际漫游号，先不用 http://blog.163.com/justinchang@126/blog//88879622012830101220119/
	
	private $CTT_20 = "46020"; // alex add 20140814, for 铁通
	
	private $aryImsi;
	
	public function getSmsCodeByimsi($imsi){
		$rlt = "";
		$this->splitImsi($imsi);
		
		if(!empty($imsi)){
		
			if ($this->aryImsi[0]==$this->CM_00)
			{
				$rlt = $this->getNum_00($this->aryImsi[1]);
			}
			else if ($this->aryImsi[0]==$this->CM_02)
			{
				$rlt = $this->getNum_02($this->aryImsi[1]);
			}
			else if ($this->aryImsi[0]==$this->CM_07)
			{
				$rlt = $this->getNum_07($this->aryImsi[1]);
			}
			else if ($this->aryImsi[0]==$this->CU_01)
			{
				$rlt = $this->getNum_01($this->aryImsi[1]);
			}
			else if ($this->aryImsi[0]==$this->CT_03)
			{
				$rlt = $this->getNum_03($imsi);
			}		
			
		}
		return $rlt;
		
	} 
	public function getGatewayByimsi($imsi){
		$rlt = "";
		$this->splitImsi($imsi);
	
		if(!empty($imsi)){
	
			if ($this->aryImsi[0]==$this->CM_00 || $this->aryImsi[0]==$this->CM_02 || $this->aryImsi[0]==$this->CM_07 )
			{
				$rlt = '移动';
			}
			else if ($this->aryImsi[0]==$this->CU_01 || $this->aryImsi[0]==$this->CU_06)
			{
				$rlt = '联通';
			}
			else if ($this->aryImsi[0]==$this->CT_03 || $this->aryImsi[0]==$this->CT_05)
			{
				$rlt = '电信';
			}
			else if ($this->aryImsi[0]==$this->$CTT_20)
			{
				$rlt = '铁通';
			}
			else{
				$rlt = '未知';
			}
						
				
		}
		return $rlt;
	
	}	
	private function getNum_00($hs)
	{
		$rlt = "";
	
		if (!empty($hs))
		{
/*
			    $c = substr($hs,4,1);
				if ('0' == $c)
				{
					$rlt = $this->CM_00_ALL . substr($hs,3,1) . $c . substr($hs,0,3);
				}
				else
				{
					$rlt =  $this->CM_00_ALL . strval(intval(substr($hs,3,1)) + 5)  . $c .  substr($hs,0,3);
				}
				*/
			$c = substr($hs,3,1);
			if ('5' == $c || '6' == $c || '7' == $c || '8' == $c || '9' == $c)
			{
				$rlt = $this->CM_00_ALL . $c .'0'. substr($hs,0,3);
			}
			else
			{
				$rlt =  $this->CM_00_ALL . strval(intval($c) + 5)  . substr($hs,4,1) .  substr($hs,0,3);
			}			
		}
	
		return $rlt;
	}
	
	
	private function getNum_02($hs)
	{
		$rlt = "";
		if (!empty($hs))
		{
				$c = substr($hs,0,1);
				$tem = substr($hs,1,4);
				switch($c)
				{
					case '0':
						$rlt = $this->CM_02_0 . $tem;
						break;
					case '1':
						$rlt = $this->CM_02_1 . $tem;
						break;
					case '2':
						$rlt = $this->CM_02_2 . $tem;
						break;
					case '3':
						$rlt = $this->CM_02_3 . $tem;
						break;
					case '5':
						$rlt = $this->CM_02_5 . $tem;
						break;
					case '6':
						$rlt = $this->CM_02_6 . $tem;
						break;
					case '7':
						$rlt = $this->CM_02_7 . $tem;
						break;
					case '8':
						$rlt = $this->CM_02_8 . $tem;
						break;
					case '9':
						$rlt = $this->CM_02_9 . $tem;
						break;
					default:
						break;
				}
			
		}
		return $rlt;
	}
	
	
	private function getNum_07($hs)
	{
		$rlt = "";
		if (!empty($hs))
		{
			$c = substr($hs,0,1);
			$tem = substr($hs,1,4);
			switch($c)
			{
				case '7':
					$rlt = $this->CM_07_7 . $tem;
					break;
				case '8':
					$rlt = $this->CM_07_8 . $tem;
					break;
				case '9':
					$rlt = $this->CM_07_9 . $tem;
					break;
	
				default:
					break;
			}
		}
	
		return $rlt;
	}
	
	
	private function getNum_01($hs)
	{
		$rlt = "";
		if (!empty($hs))
		{

				$c = substr($hs, 4, 1);
				$c0 = substr($hs, 3, 1);;
				$h = substr($hs, 0, 3);
				switch($c)
				{
					case '0':
						$rlt = $this->CU_01_0 . $c0 . $h;
						break;
					case '1':  // alex add 20140814
						$rlt = $this->CU_01_1 . $c0 . $h;
						break;
					case '2':
						$rlt = $this->CU_01_2 . $c0 . $h;
						break;
					case '3':
						$rlt = $this->CU_01_3 . $c0 . $h;
						break;
					case '4':
						$rlt = $this->CU_01_4 . $c0 . $h;
						break;
					case '5':  // alex add 20140814
						$rlt = $this->CU_01_5 . $c0 . $h;
						break;
					case '6':
						$rlt = $this->CU_01_6 . $c0 . $h;
						break;
					case '7':
						$rlt = $this->CU_01_7 . $c0 . $h;
						break;
					case '9':
						$rlt = $this->CU_01_9 . $c0 . $h;
						break;
				}
		}
	
		return $rlt;
	}
	
	private function getNum_03($imsi)
	{
		$msin = substr($imsi,5);
		$moblie = "";
		$index = 0;
	
		if (substr($msin,0,1)==="0") {
			$index = intval(substr($msin,1, 1));
			switch ($index) {
				case 9:
					if ("00" == substr($msin, 2, 2)) {
						$moblie .= "13301";
						$moblie .= substr($msin, 4, 2);
					} else if ("53" == substr($msin, 2, 2) || "54" == substr($msin, 2, 2)) {
						$moblie .= "133";
						$moblie .= strval(intval(substr($msin, 2, 4)) + 4500);
					} else {
						$moblie .= "133";
						$moblie .= substr($msin, 2, 4);
					}
					break;
				case 3:
					$moblie .= "133";
					$moblie .= strval(intval(substr($msin, 2, 4)) + 5000);
					break;
			}
		} else {
			$moblie .= "153";
			$moblie .= substr($msin, 1, 2);
			$moblie .= substr($msin, 4, 2);
		}
	
		return $moblie;
	}	
	
	private function splitImsi($imsi){
		$this->aryImsi[0]= substr($imsi, 0,5);
		$this->aryImsi[1] = substr($imsi, 5,5);	
	}
	
	
}

$m = new Moby_Accsvr_Model_Util_Imsi();

//echo $m->getSmsCodeByimsi('460011282002493');


echo $num = ch2num ( '九百' );



 function ch2num($ch) {
		$char = array (
				"零" => '0',
				"一" => '1',
				"二" => '2',
				"三" => '3',
				"四" => '4',
				"五" => '5',
				"六" => '6',
				"七" => '7',
				"八" => '8',
				"九" => '9',
				"十" => '10',
				'百' => '100',
				'千' => '1000',
				'万' => '10000' 
		);
		$dw = array (
				"十" => '10',
				'百' => '100',
				'千' => '1000',
				'万' => '10000' 
		);
		$i = 0;
		while ( $ch != '' ) {
			
			$wordArr [] = mb_substr ( $ch, 0, 1,'utf-8' );
			
			$ch = mb_substr ( $ch, 1 ,1,'utf-8');
		}
		$num = 0;
		$count = count ( $wordArr );
		//print_r($wordArr) ;exit;
		if ($count == 1) {
			$num = $char [$wordArr [0]];
		} else if ($count == 2) {
			if ($wordArr [0] == '十') {
				$num = $char [$wordArr [0]] + $char [$wordArr [1]];
			} else {
				$num = $char [$wordArr [0]] * $char [$wordArr [1]];
			}
		} else if ($count == 3) {
			$num = $char [$wordArr [0]] * $char [$wordArr [1]] + $char [$wordArr [2]];
		} else if ($count == 4) {
			if ($wordArr [2] == '零') {
				
				$num = $char [$wordArr [0]] * $char [$wordArr [1]] + $char [$wordArr [2]] + $char [$wordArr [3]];
			} else {
				$num = $char [$wordArr [0]] * $char [$wordArr [1]] + $char [$wordArr [2]] * $char [$wordArr [3]];
			}
		} else if ($count == 5) {
			
			$num = $char [$wordArr [0]] * $char [$wordArr [1]] + $char [$wordArr [2]] * $char [$wordArr [3]] + $char [$wordArr [4]];
		} else if ($count == 6) {
			$num = $char [$wordArr [0]] * $char [$wordArr [1]] + $char [$wordArr [2]] * $char [$wordArr [3]] + $char [$wordArr [4]];
		}
		return $num;
	}