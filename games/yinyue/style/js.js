var domain='http://'+document.domain+'/games/yinyue/';
var config={};
try{
	config.canPlayM4a = !!(document.createElement('audio').canPlayType("audio/mpeg"));
	config.canPlayAac = !!document.createElement("audio").canPlayType && document.createElement("audio").canPlayType('audio/mp4; codecs="mp4a.40.2"')=='probably';
}catch(e){
}
/*
* 智能机浏览器版本信息:
*
*/
 	var browser={
    versions:function(){ 
           var u = navigator.userAgent, app = navigator.appVersion; 
           return {//移动终端浏览器版本信息 
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/)||!!u.match(/AppleWebKit/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或者uc浏览器
                iPhone: u.indexOf('iPhone') > -1 || u.indexOf('Mac') > -1, //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
            };
         }(),
         language:(navigator.browserLanguage || navigator.language).toLowerCase()
}
var ajax = function (conf) {
	var type = conf.type;
	var url = conf.url;
	var data = conf.data;
	var dataType = conf.dataType;
	var success = conf.success;
	if (type == null) {
		type = "get";
	}
	if (dataType == null) {
		dataType = "text";
	}
	var xhr = createAjax();
	xhr.open(type, url, true);
	if (type == "GET" || type == "get") {
		xhr.send(null);
	} else {
		if (type == "POST" || type == "post") {
			xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			xhr.send(data);
		}
	}
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			if (dataType == "text" || dataType == "TEXT") {
				if (success != null) {
					success(xhr.responseText);
				}
			} else {
				if (dataType == "xml" || dataType == "XML") {
					if (success != null) {
						success(xhr.responseXML);
					}
				} else {
					if (dataType == "json" || dataType == "JSON") {
						if (success != null) {
							success(eval("(" + xhr.responseText + ")"));
						}
					}
				}
			}
		} else {
			if (xhr.readyState == 4 && xhr.status != 200) {
			}
		}
	};
};
var createAjax = function () {
	var xhr = null;
	try {
		xhr = new ActiveXObject("microsoft.xmlhttp");
	}
	catch (e1) {
		try {
			xhr = new XMLHttpRequest();
		}
		catch (e2) {
			window.alert("\u60a8\u7684\u6d4f\u89c8\u5668\u4e0d\u652f\u6301ajax\uff0c\u8bf7\u66f4\u6362\uff01");
		}
	}
	return xhr;
};
function $S(s) {
	return document.getElementById(s);
}
function $html(s, html) {
	$S(s).innerHTML = html;
}
function $display(s, f) {
	$S(s).style.display = f;
}
function $isvisible(s){
	try{if($S(s).style.display=='none')return false;}catch(e){return false;}
	return true;
}

//播放js代码开始
function getMedia(){
	return $S('mediaPlayId'); 
}
function isHTML5(){
	try{
		var hasAudio = !!(document.createElement('audio').canPlayType("audio/mpeg"));
		return hasAudio;
   }catch(e){return false;}
}
function isLocalStorage(){
	if(window.localStorage){
	   return true;
	}
	return false;
}

function opcomm(){
	return 0;
}
function playstopop(){
	if(opcomm())return;
	var btnpic=$S("playstopid").src;
	if(btnpic.indexOf("4.png")>-1){
		try{getMedia().pause();}catch(e){}
		getMedia().play();
		$S('playstopid').src=domain+"/style/2.png";
	}else{
		getMedia().pause();
		$S('playstopid').src=domain+"/style/4.png";
	}
}
function nextsong(){
	if(opcomm())return;
	preSong(0);
}
function prevsong(){
	if(opcomm())return;
	preSong(1);
}

var lrcLst=null;
var llrcObj=null;
function lrcinfo(data){
	lrcLst=data;
	if(!lrcLst || lrcLst.length==0){
		$html("lrctextId","随便听听");
	}else{			
		var htm=[];
		htm[htm.length]="<div id='llrcId' style='overflow-x: hidden;overflow-y: hidden;'>";
		for(var i=0;i<lrcLst.length;i++){
			if(i==0){
				htm[htm.length]='<p id="lId'+i+'">';
			}else{
				htm[htm.length]="<p id='lId"+i+"'>";	
			}
			htm[htm.length]=lrcLst[i].text;
			htm[htm.length]="</p>";
		}
		htm[htm.length]="</div>";
		$html("lrctextId",htm.join(""));
	}
	llrcObj=$S("llrcId");
	var h=document.documentElement.clientHeight-155;
	try{llrcObj.style.marginTop=(parseInt(h/30)*30/2-75)+"px";}catch(e){}
}
function playSong(url){
	if(browser.versions.ios || browser.versions.iPhone || browser.versions.iPad){
		getMedia().src=url;
		try{getMedia().load();}catch(e){};
		getMedia().play();
	}else{
		if(navigator.userAgent.indexOf("hrome")>-1){
			getMedia().src=url;
			try{getMedia().load();}catch(e){};
			getMedia().play();
		}else{
			$html('playHTMLId','<audio id="mediaPlayId" src="'+url+'" onended="managerPlst(\'statDivId\');" onloadstart="loadStatus(\'statDivId\');" onplaying="playStatus(\'statDivId\')" onpause="pauseStatus(\'statDivId\')" onerror="loadError(\'statDivId\')" ontimeupdate="updateMethod(\'statDivId\')" mozaudiochannel="content" autoplay="autoplay" controls></audio>');
		}
	}
}

var loadtime=0;
function playStatus(id){
	if(isplay==0){
		setToast("开始播放...");
		//if(toastTime!=null){
		//	clearTimeout(toastTime);
		//}
		//$S('toastId').className='toasttj tsdh';
		//toastTime=setTimeout(function(){
		//	$display('toastId','none');
		//},3000);
	}
	if(isplay2==1){
		if(smsecTime!=null){
			clearTimeout(smsecTime);
		}
		isplay2=0;
	}
}
function pauseStatus(id){
	setToast("播放暂停...");
}
function loadError(id){
	$html(id,"加载出错....");
}
var ltime=0;
var isplay=1;
var isplay2=1;
function updateMethod(id){
	try{
		if(isplay==1 && Math.floor(getMedia().currentTime)==1){
			$S('playstopid').src=domain+"/style/2.png";
		 	if(toastTime!=null){
				clearTimeout(toastTime);
			}
			//setToast("开始播放...");
			//$S('toastId').className='toasttj tsdh';
			//toastTime=setTimeout(function(){
			//	$display('toastId','none');
			//},3000);
			isplay=0;
		}
		jsctrl()
		
		$html('currTimeId',getTimeM(getMedia().currentTime));
		$html('totalTimeId',getTimeM(curr_total));
		
		if(ltime>3){
			moveLrc();
			ltime=0;
		}
		ltime++;
	}catch(e){e.message}
}
function jsctrl(){
	if(g_ydmoreflag){
		var totalw=document.body.clientWidth;
		var jd=totalw*getMedia().currentTime/parseFloat(curr_total);
		if(jd>totalw){
			jd=totalw;
		}
		$S("youwid").style.width=jd+"px";
		if(jd>(totalw-10)){
			jd=totalw-10;
		}
		//$S("ydbtnid").style.left=jd+"px";
		ydbtnobj.style.left=jd+"px";
	}
}

var lastLine=0;
function moveLrc(){
	if(!lrcLst || lrcLst.length==0)return;
	var msec=getMedia().currentTime+1;
	var found=false;
	var mv=0;
	var sIndex=0;
	for (var i = 0; i < lrcLst.length ; i++) {
		if (found == false && msec >= lrcLst[i].timeId && (i == lrcLst.length-1 || lrcLst[i+1].timeId > msec)) {
			mv=i*30;
			sIndex = i;
			found = true;
		}
	}
	if (mv != 0) {
		if(lastLine){try{$S("lId"+lastLine).className='';}catch(e){}}
		try{$S("lId"+sIndex).className='lyric_now';}catch(e){}
		lastLine=sIndex;
		
		try{$S('llrcId').style.webkitTransition="-webkit-transform 500ms ease-out";}catch(e){}
		try{$S('llrcId').style.webkitTransform="translate(0px,"+-mv+"px) scale(1) translateZ(0px)";}catch(e){}	
	}
}

var sjflag=2;//0单曲,1顺序,2循环,3随机
function managerPlst(divId){
	preSong(0,1);
}
var smsecTime=null;
function loadStatus(id){
	$S('playstopid').src=domain+"/style/4.png";

	//setToast("正在加载...");
	if(smsecTime!=null){
		clearTimeout(smsecTime);
	}
}
function preSong(flag,autoflag){//0下一首,1上一首
	if(playlist && playlist.length>0){
		if(flag==0){
			if(g_index<playlist.length-1){
				indexplay(g_index+1);
			}else{
				indexplay(0);
			}
		}else{
			if(g_index==0){
				indexplay(playlist.length-1);
			}else{
				indexplay(g_index-1);
			}
		}
	}
}
var g_index=0;
function indexplay(index){
	if(playlist && playlist.length>0){
		var music=playlist[index];
		getSongInfo(music);
		g_index=index;
	}
}
function clearload(){
	try{
		errjs=0;
		isplay=1;
		isplay2=1;
		getMedia().src="";
		getMedia().load();
	}catch(e){};
}
function getTimeM(totalTime){
	var totalTimeStr="00:00";
	if(!isNaN(totalTime)){
		var totalTimeStr=totalTime/60>=10?parseInt(totalTime/60):"0"+parseInt(totalTime/60);
		totalTimeSec=(totalTime%60>=10?parseInt(totalTime%60):"0"+parseInt(totalTime%60));
		if(totalTimeStr>99){
			totalTimeStr="00";
		}
		totalTimeStr=totalTimeStr+":"+totalTimeSec;
	}
	return totalTimeStr;
}

function setlrch(){
	var h=document.documentElement.clientHeight-155;
	$S('lrctextId').style.height=parseInt(h/30)*30+"px";
}
function setHfbg(){
	setlrch();
}

var g_rid='';
var g_name='';
var g_art='';
var g_music={};
var p_song_flag=0;
function dsExe(){
	p_song_flag=0;
}
function getSongInfo(obj,flag){
	try{getMedia().play();}catch(e){}
	wb_flag=flag;
	g_music=obj;
	clearload();
	if(p_song_flag==0){
		p_song_flag=1;
		//setTimeout(dsExe,3000);
var hash=document.getElementById("hash").innerHTML;
		var queryUrl=domain+"/lrc.php?hash="+hash;

		ajax({type:"get", url:queryUrl,dataType:"json", success:function (data){
			songInfo(data);
		}});
	}
}
var curr_total=0;
function songInfo(data) {
	p_song_flag=0;
	var sobj=data.songinfo;
	var tk="aac";
	if(!config.canPlayAac){
		tk="mp3";
	}
	var songName=sobj.name;
	var art=sobj.artist;
	curr_total=sobj.duration;
	
	$html('songNameid',songName+"-"+art);
	g_name=songName;
	g_art=art;
	lrcinfo(data.lrclist);

var hash=document.getElementById("hash").innerHTML;
	var queryUrl=domain+"/src.php?hash="+hash;
playSong(data.songinfo.src);


/*
	ajax({type:"get", url:queryUrl,dataType:"json", success:function (data){
		playSong(data.url);
	}});
*/

}
function playSong(url){
	if(browser.versions.ios || browser.versions.iPhone || browser.versions.iPad){
		getMedia().src=url;
		try{getMedia().load();}catch(e){};
		getMedia().play();
	}else{
		if(navigator.userAgent.indexOf("hrome")>-1){
			getMedia().src=url;
			try{getMedia().load();}catch(e){};
			getMedia().play();
		}else{
			$html('playHTMLId','<audio id="mediaPlayId" src="'+url+'" onended="managerPlst(\'statDivId\');" onloadstart="loadStatus(\'statDivId\');" onplaying="playStatus(\'statDivId\')" onpause="pauseStatus(\'statDivId\')" onerror="loadError(\'statDivId\')" ontimeupdate="updateMethod(\'statDivId\')" mozaudiochannel="content" autoplay="autoplay" controls></audio>');
		}
	}
}

var ydbtnobj = null;
var g_ydmoreflag=1;
var g_ydbtnpos=0;
function movejdctrl(event){
	// 如果这个元素的位置内只有一个手指的话
    if (event.targetTouches.length == 1) {
　　　　 event.preventDefault();// 阻止浏览器默认事件，重要 
        var touch = event.targetTouches[0];
        
        var totalw=document.body.clientWidth;
        // 把元素放在手指所在的位置
        var tmpw=touch.pageX;
        g_ydbtnpos=tmpw;
        if(tmpw<0){
        	tmpw=0;
        }else if(tmpw>(totalw-10)){
			tmpw=totalw-10;
        }
        $S("youwid").style.width=tmpw+"px";
        ydbtnobj.style.left = tmpw + 'px';
    }
}
var hfindex=0;
function hfclick(){
	if(hfindex<bglist.length){
		hfindex++;
	}else{
		hfindex=0;
	}
	
	var pic=bglist[hfindex];
	$S("bgid").style.background="url("+pic+") center no-repeat";
	$S("bgid").style.backgroundSize="cover";
}
var flindex=0;
function c_init(){
	setHfbg();
	/*单指拖动*/
	ydbtnobj = $S('ydbtnid');
	
	
	ydbtnobj.addEventListener('touchstart', function(event) {
		event.preventDefault();// 阻止浏览器默认事件，重要
		g_ydmoreflag=0;
		ydbtnobj.addEventListener('touchmove',movejdctrl, false);
	}, false);
	ydbtnobj.addEventListener('touchend', function(event) {
		event.preventDefault();// 阻止浏览器默认事件，重要
		
		var totalw=document.body.clientWidth;
		var playm=g_ydbtnpos/totalw*curr_total;
		getMedia().currentTime = playm;
		jsctrl();
		
		g_ydmoreflag=1;
		ydbtnobj.removeEventListener('touchmove', movejdctrl, false);
	}, false);
	
	var playBoxObj=document.getElementById("clickbarid");
	playBoxObj.addEventListener('touchstart', function(event) {
		event.preventDefault();// 阻止浏览器默认事件，重要
		if(g_ydmoreflag){ 
			var touch = event.targetTouches[0];
			
			var totalw=document.body.clientWidth;
			var playm=(touch.pageX)/totalw*curr_total;
			getMedia().currentTime = playm;
			jsctrl();
		}
	}, false);
	
	flindex=Math.floor(Math.random()*9);
	var queryUrl=domain+'/getbang.php?act=banglist&index='+flindex;
	ajax({type:"get", url:queryUrl,dataType:"json", success:function (data){
		$html('songNameid',data.banglist[flindex].name);
		playlist=data.songlist;
		indexplay(0);
	}});
}
window.onscroll=setHfbg;
window.onload=c_init;
window.onresize=setHfbg;