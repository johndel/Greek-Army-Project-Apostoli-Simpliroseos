varTAdsQT='ck=1';varTAdsSkimPct=1000;var varDivRand=Math.floor(Math.random()*11000);document.write('<div id="uat'+varDivRand+'"></div>');var uatRandNo=Math.floor(Math.random()*100000);var varPassOapp="";var varPublisherId="6463";var varFileId="17949";var varSectionIDAPN="747902";var varChannels="tch,itn";var varChannelIDs="44,67";var varRBArray=new Array();if(!window.teRBID){var varRandom=Math.floor(Math.random()*varRBArray.length);var teRBID=varRBArray[varRandom]}var scripts=document.getElementsByTagName("script");var icount=1;for(icount=1;icount<scripts.length;icount++){var tempScript=scripts[scripts.length-icount];var uatStart=tempScript.src.indexOf("/uat_");if(uatStart>0){break}}var myScript=scripts[scripts.length-icount];var queryString=myScript.src.replace(/^[^\?]+\??/,"");var divID=document.getElementById("uat"+varDivRand);var adStartHeight=findPosition(divID);varQueryAdSize=parseQuery(queryString,"ad_size");varQueryReferrer=parseQuery(queryString,"referrer");varDocReferrer=getDocReferrer(varQueryReferrer);var adWidth=getWidth(varQueryAdSize);var adHeight=getHeight(varQueryAdSize);if(varQueryAdSize.indexOf(",")>-1){var arrAdSize=varQueryAdSize.split(",");adWidth=getWidth(arrAdSize[0]);adHeight=getHeight(arrAdSize[0])}var windowHeight=WindowGetHeight();var adEndHeight=parseInt(adStartHeight)+parseInt(adHeight/2);if(adEndHeight>windowHeight){var varPredeterminedFold=700;if(adEndHeight>varPredeterminedFold){aboveFold=0}else{aboveFold=2}apnAboveFold="below"}else{aboveFold=1;apnAboveFold="above"}var uatStart=myScript.src.indexOf("uat_");var uatEnd=myScript.src.indexOf(".js?");var uatID=myScript.src.substring(uatStart+4,uatEnd);if(!window.varFirstUATID){varFirstUATID=uatID}else{if(varFirstUATID!=uatID){uatID="error/"+uatID}}var findSlash=window.location.pathname.indexOf("/");if(findSlash==0){var passPageTracker="/"+uatID+"/"+window.location.host+""+window.location.pathname}else{var passPageTracker="/"+uatID+"/"+window.location.host+"/"+window.location.pathname}var varInactiveAdFormat=0;var varQueryAdSize=parseQuery(queryString,"ad_size");if(varInactiveAdFormat==0){varAdPTVs="";var callForAds=1;var callForPixel=1;var varAdStop1=parseQuery(queryString,"!c");if(varAdStop1!=false){if(varAdStop1.toLowerCase()=="house"){callForAds=0}}var changeSection=0;var changeSectionValue=-1;varPTVs="";var varccp=getURLParam("ccp");if(varccp!="323WERKJKLDSJFlk23ididfj42342"){varPTVs=varPTVs+"&ccp="+varccp}var vartmtest=getURLParam("tmtest");if(vartmtest!="323WERKJKLDSJFlk23ididfj42342"){varPTVs=varPTVs+"&tmtest="+vartmtest}var varq=getURLParam("q");if(varq!="323WERKJKLDSJFlk23ididfj42342"){varPTVs=varPTVs+"&q="+varq}var varccpvalue=getURLParam("ccpvalue");if(varccpvalue!="323WERKJKLDSJFlk23ididfj42342"){varPTVs=varPTVs+"&ccpvalue="+varccpvalue}var varroadblock=getURLParam("roadblock");if(varroadblock!="323WERKJKLDSJFlk23ididfj42342"){varPTVs=varPTVs+"&roadblock="+varroadblock}_qoptions={qacct:"p-6cp0NSw2i2sSA",labels:"Technology,IT/Network"};var prm=0;prm=prm+"&efo=0";prm=prm+"&dir=1";prm=prm+"&pas=0";var cookieCount=getCookie("TMEDIA");var getCookieIsp=getCookie("TMEDIAISP");if(cookieCount!=-1){var cookieCountry=cookieCount.substring(5,cookieCount.indexOf("/"));queryString=queryString+"&dmsc="+cookieCountry+"&dmsi="+escape(getCookieIsp)}if(window.varDocRefType!="adnetwork"){if(varDocReferrer!=undefined&&varDocReferrer!=""){var ref=parseQuery(varDocReferrer,"referrer");if(ref!=null&&ref!=""){queryString=queryString+"&"+varDocReferrer;queryString=queryString+"&pub_url="+ref}}}var srcURL="";varUrlParam=-1;if(!window.teRBID){if(varPassOapp==""){if(changeSection==1){srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&"+queryString}else{srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&"+queryString}}else{if(changeSection==1){srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+""+varPassOapp+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+""+varPassOapp+"&"+queryString}else{srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+""+varPassOapp+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+""+varPassOapp+"&"+queryString}}}else{if(varPassOapp==""){if(changeSection==1){srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+"&"+queryString}else{srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+"&"+queryString}}else{if(changeSection==1){srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+""+varPassOapp+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&section="+changeSectionValue+"&ad_type=ad"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+""+varPassOapp+"&"+queryString}else{srcURL="http://ad.technoratimedia.com/st?pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&atf="+aboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+""+varPassOapp+"&"+queryString;varUrlParam="pfm=1&ttch=ch&titn=ch&rtg=ga&brw="+browserversion+"&os="+osname+"&prm="+prm+"&position="+apnAboveFold+"&uatRandNo="+uatRandNo+"&ad_type=ad&section=2797516"+varAdPTVs+""+varPTVs+"&rbCode="+teRBID+""+varPassOapp+"&"+queryString}}}if(callForAds==1){var bizData=getCookie("bcookie");if(bizData!=-1){srcURL=srcURL+"&"+bizData}var varPassRand=Math.floor(Math.random()*11000000000);var varTmStatsUrl="http://tmstats.technoratimedia.com/blank.gif?sysid=17949&size="+varQueryAdSize+"&randNo="+varPassRand+"&seqNo=";varGRM=0;if(varQueryAdSize.indexOf(",")>-1){var arrAdSize=varQueryAdSize.split(",");tsrcURL="http://tmx.technoratimedia.com/ttj?id=747902&promo_alignment=none&size="+arrAdSize[0]+"&promo_sizes="+arrAdSize[1]}else{tsrcURL="http://tmx.technoratimedia.com/ttj?id=747902&size="+varQueryAdSize}if(varGRM==0&&varUrlParam!=-1){tsrcURL=tsrcURL+"&"+varUrlParam}tsrcURL=tsrcURL+"&cb="+varPassRand;if(window.varTAdsQv){srcURL=srcURL+"&"+window.varTAdsQv;tsrcURL=tsrcURL+"&"+window.varTAdsQv}if(window.varTAdsQT&&window.varTAdsQT.length>0){srcURL=srcURL+"&"+window.varTAdsQT;tsrcURL=tsrcURL+"&"+window.varTAdsQT}if(window.varTAdsSkimPct!=undefined){var varRaPe=Math.floor(Math.random()*100);if(varRaPe<window.varTAdsSkimPct&&window.varTAdsSkimPct>0&&window.varTAdsSkimPct<101){tsrcURL=srcURL}else{if(varRaPe<(window.varTAdsSkimPct%1000)&&window.varTAdsSkimPct>100){tsrcURL="http://ad-cdn.technoratimedia.com/psa/psa.js"}}}document.write('<script type="text/javascript" src="'+tsrcURL+'"></scr'+"ipt>")}var varAggPubId="6463_17949";if(callForPixel==1){if(!window.varPixel8==1){if(typeof COMSCORE=="undefined"){var COMSCORE={}}COMSCORE.beacon=function(o){if(!o){return}var j=1.7,n=document,k=n.location,l=512,p=function(b,a){if(b==null){return""}b=(encodeURIComponent||escape)(b);if(a){b=b.substr(0,a)}return b},m=[(k.protocol=="https:"?"https://sb":"http://b"),".scorecardresearch.com/b?","c1=",p(o.c1),"&c2=",p(o.c2),"&rn=",Math.random(),"&c7=",p(k.href,l),"&c3=",p(o.c3),"&c4=",p(o.c4,l),"&c5=",p(o.c5),"&c6=",p(o.c6),"&c10=",p(o.c10),"&c15=",p(o.c15),"&c16=",p(o.c16),"&c8=",p(n.title),"&c9=",p(n.referrer,l),"&cv=",j,o.r?"&r="+p(o.r,l):""].join("");m=m.length>2080?m.substr(0,2075)+"&ct=1":m;var i=new Image();i.onload=function(){};i.src=m;return m};document.write("<!-- Begin comScore Tag -->");document.write("<script>");document.write(" COMSCORE.beacon({");document.write(" c1:2,");document.write(" c2:6036211,");document.write(' c3:"",');document.write(' c4:"",');document.write(' c5:"",');document.write(' c6:"",');document.write(' c15:""');document.write(" });");document.write("<\/script>");document.write("<noscript>");document.write(' <img  src="http://b.scorecardresearch.com/b?c1=2&c2=6036211&c3=&c4=&c5=&c6=&c15=&cv=1.3&cj=1" style="display:none" width="0" height="0" alt="" />');document.write("</noscript>");document.write("<!-- End comScore Tag -->");var varPixel8=1}if(!window.varPixel21==1){var varPixel21=1}if(!window.varPixel23==1){document.write('<script type="text/javascript" src="http://adadvisor.net/adscores/r.js?sid=9209810687"></scr'+"ipt>");var varPixel23=1}if(!window.varPixel29==1){var varAggRandNo=Math.floor(Math.random()*100000);var varAggUrl="http://d.agkn.com/iframe!t=1209!?che="+varAggRandNo+"&ent=092611&camid=032112&plaid="+varSectionIDAPN+"&adgid="+varPublisherId;document.write("<iframe width='1' height='1' marginwidth='0' marginheight='0' frameborder='0' src='"+varAggUrl+"'></iframe>");var varPixel29=1}}if(typeof COMSCORE=="undefined"){var COMSCORE={}}COMSCORE.beacon=function(o){if(!o){return}var j=1.7,n=document,k=n.location,l=512,p=function(b,a){if(b==null){return""}b=(encodeURIComponent||escape)(b);if(a){b=b.substr(0,a)}return b},m=[(k.protocol=="https:"?"https://sb":"http://b"),".scorecardresearch.com/b?","c1=",p(o.c1),"&c2=",p(o.c2),"&rn=",Math.random(),"&c7=",p(k.href,l),"&c3=",p(o.c3),"&c4=",p(o.c4,l),"&c5=",p(o.c5),"&c6=",p(o.c6),"&c10=",p(o.c10),"&c15=",p(o.c15),"&c16=",p(o.c16),"&c8=",p(n.title),"&c9=",p(n.referrer,l),"&cv=",j,o.r?"&r="+p(o.r,l):""].join("");m=m.length>2080?m.substr(0,2075)+"&ct=1":m;var i=new Image();i.onload=function(){};i.src=m;return m};document.write("<!-- Begin comScore Tag -->");document.write("<!-- End comScore Tag -->");document.write(unescape("%3Cscript src='"+(document.location.protocol=="https:"?"https://sb":"http://b")+".scorecardresearch.com/beacon.js?c1=8&c2=6036211&c3=&c4=&c5=&c6=&c10=' %3E%3C/script%3E"));document.write("<noscript>");document.write(' <img src="http://b.scorecardresearch.com/p?c1=8&c2=6036211&c3=&c4=&c5=&c6=&c10=&cj=1" style="display:none" width="0" height="0" alt="" />');document.write("</noscript>");var hash=getUrlVars();var refParName=hash[0];var refParValue=hash[hash[0]];var Dname=getDomainName();varQueryAdSize=varQueryAdSize+"_prm"+prm}function displayAds(){if(window.varTAdsSkimPct!=undefined){if(window.varTAdsSkimPct>100){document.write('<script type="text/javascript" src="http://ad-cdn.technoratimedia.com/psa/psa.js"></scr'+"ipt>")}else{document.write('<script type="text/javascript" src="'+srcURL+'"></scr'+"ipt>")}}else{document.write('<script type="text/javascript" src='+srcURL+'"></scr'+"ipt>")}};