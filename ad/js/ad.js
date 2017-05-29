function SetCookie(objName,objValue,objHours)
{
  var str = objName + '=' + escape(objValue);
  if(objHours > 0)
{
    var date = new Date();
  var ms = objHours*3600*1000;
 date.setTime(date.getTime() + ms);
 str += '; expires=' + date.toGMTString();
 }
 document.cookie = str;
}
function JunnewReadCookie(JunnewCookieName)  
{ 
		var JunnewTheCookie = '' + document.cookie; 
	var JunnewInd = JunnewTheCookie.indexOf(JunnewCookieName); 
	if (JunnewInd == - 1 || JunnewCookieName == '') 
	return ''; 
	var JunnewInd1 = JunnewTheCookie.indexOf(';', JunnewInd); 
if (JunnewInd1 == - 1) 
	JunnewInd1 = JunnewTheCookie.length;
	return unescape(JunnewTheCookie.substring(JunnewInd + JunnewCookieName.length + 1, JunnewInd1));
}
SetCookie('junnewAdbox_5931','12583',24);
Kuwa_ADurl_t='http://dahao.de/wechat/zuopin/ec283a85-86e3-11e6-888b-8038bc0baf3f';
Kuwa_adSourceFile='/ad/img/jy.png';
Kuwa_AsizeWidth=0;
Kuwa_AsizeHigh=80;
isP4p=0;
p4pString="";
furl=escape(window.location);
activRB_getModelJS='img_float_top_close.js';// JavaScript Document¡¡H5
var strEndFlag = Kuwa_adSourceFile.substring(Kuwa_adSourceFile.lastIndexOf('.'),Kuwa_adSourceFile.length);
var Kuwa_IMG_LINK="";
var newWidth = "100%";

if (strEndFlag == ".swf"){
	Kuwa_ADurl_t = Kuwa_ADurl_t.replace(/&/g,"|");
	Kuwa_IMG_LINK += "<EMBED src='"+Kuwa_adSourceFile+"?jurl="+Kuwa_ADurl_t+"' quality=high wmode=transparent bgcolor=#FFFFFF WIDTH='"+newWidth+"' HEIGHT='"+Kuwa_AsizeHigh+"' NAME='junnewMovie' ALIGN='' TYPE='application/x-shockwave-flash' PLUGINSPAGE='http://www.macromedia.com/go/getflashplayer'>";
	Kuwa_IMG_LINK += "</EMBED>";
} else if (strEndFlag ==".jpg" || strEndFlag ==".gif" || strEndFlag ==".png"){
	Kuwa_IMG_LINK = "<a href='"+Kuwa_ADurl_t+"' target='_blank'><img src='"+Kuwa_adSourceFile+"' WIDTH="+newWidth+"  border=0></a>";
}

document.write("<div id='Kuwa_right' style='width:"+newWidth+"; z-index:9998; position:absolute; position:fixed;left:0;bottom:0; visibility:visible;' >");
document.write("<div style='position:absolute; top:0; right:0; z-index:9999; '><img src='http://img.junnew.com/img/msgClose.gif'  onclick='kuwa_closeDiv()' border=0/></div>");
document.write(Kuwa_IMG_LINK);
document.write("</div>");

function kuwa_closeDiv() { 
	var Kuwa_right = document.getElementById('Kuwa_right');
	Kuwa_right.style.visibility='hidden'; 
	
	setTimeout("kuwa_openDiv()", 10000);
}

function kuwa_openDiv(){
	var Kuwa_right = document.getElementById('Kuwa_right');
	Kuwa_right.style.visibility='visible';
}
