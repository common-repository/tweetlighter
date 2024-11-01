function remove_space(space) { return space.replace(/^\s+|\s+$/, ''); };
	
function display() {
  if (document.getSelection) {
    var str = document.getSelection();
  } else if (document.selection && document.selection.createRange) {
    var range = document.selection.createRange();
    var str = range.text;
  } else {
    var str = "Sorry, this is not possible with your browser.";
  }

if(str=='')
{
	
	return false;
	
}
 
  if(str){
 
  
 
document.getElementById("quitetwite").style.display='';
  document.getElementById("selecttext").value=str;
  ///popup open - ajax - bitly url, text, usrl
  var chctlenght=document.getElementById("selecttext").value.length;
 
  }
  
}

var browserName=navigator.appName;
if (browserName=="Microsoft Internet Explorer")
 {

window.onload=function(){
document.getElementsByTagName('body')[0].onclick=function(){
display();
}
}
 }
else
{
if (window.Event)
  document.captureEvents(Event.MOUSEUP);
document.onmouseup = display;
}
function cancel_select()
{
	document.getElementById("quitetwite").style.display='none';
var sel ;
if(document.selection && document.selection.empty){
document.selection.empty() ;
} else if(window.getSelection) {
sel=window.getSelection();
if(sel && sel.removeAllRanges)
sel.removeAllRanges() ;
}


 document.getElementById("quitetwite").style.display='none';
 
  jQuery("#select_value").hide("slow");
  document.getElementById("quitetwite").style.display='none';

}







function showtwite()
{
	
	var birtlyurl=document.getElementById("birtlyurl").value;
	var selecttext=document.getElementById("selecttext").value;
	var retweet_username=document.getElementById("retweet_username").value;
	window.open("http://www.tweetlighter.com/tweetlighter/tweetpost.php?contant="+selecttext+"&url="+birtlyurl+"&username="+retweet_username+"","mywindow","menubar=1,resizable=1,width=535,height=330,top=300,left=400,scrollbars=yes");

	
	
}

function disableSelection(){

	var sel ;
if(document.selection && document.selection.empty){
document.selection.empty() ;
} else if(window.getSelection) {
sel=window.getSelection();
if(sel && sel.removeAllRanges)
sel.removeAllRanges() ;
}
return false;
}

function timeout()
{
	jQuery("#quitetwite").hide("slow");
	disableSelection();
	
	
}
setInterval("timeout()",10000);



