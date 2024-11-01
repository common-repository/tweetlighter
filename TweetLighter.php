<?php
/*
Plugin Name: tweetlighter
Plugin URI: http://www.tweetlighter.com
Description: Retweet outside the box.  This plugin will allow your readers to tweet any text on any page of your wordpress site.
Version: 1.0
Author: tweetlighter
Author URI: http://www.tweetlighter.com
*/
ob_start();
session_start();


add_action('admin_menu','tweet_navigation'); //Add Directory Tab in the menu
 mysql_query("CREATE TABLE IF NOT EXISTS `wp_twitter_setting` (
    `retweet_username` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
/*
*  Navigation
*/
function tweet_navigation() { 
	add_menu_page(
		"tweetlighter",
		"tweetlighter",
		8,
		'tweet-sting',
		"tweet_setting_manager",
		"../wp-content/plugins/TweetLighter/images/mini_bd_icon.png"
	); 
   
}

function tweet_setting_manager()
{
if($_REQUEST['Submit']=='Save Changes')
{


 $num_rows=mysql_num_rows(mysql_query("select * from wp_twitter_setting"));
if($num_rows==0)
{
mysql_query("insert into wp_twitter_setting set  retweet_username='".$_REQUEST['retweet_username']."'");
echo "<font color='#ff0000' size='+1'>Your Twitter Account Has Been Added</font>";
}
else
{
 mysql_query("update  wp_twitter_setting set  retweet_username='".$_REQUEST['retweet_username']."'");
echo "<font color='#ff0000' size='+1'>TweetLighter Seeting has been added</font>";
}
}
$sql="select * from wp_twitter_setting";
$query=mysql_query($sql);
$result=mysql_fetch_array($query);
?>

<form action="" method="post">
<table width="100%" border="1">
<tr><td height="50" colspan="2"> <h2 style=" font-weight:normal;font-family:Georgia,Times New Roman,Bitstream Charter,Times,serif; font-style:italic; font-size:24px; line-height:35px;">Settings for tweetlighter</h2></td></tr>
<tr><td colspan="2">This plugin will install the tweetlighter widget and allow your readers to retweet simply by highlighting any text on your site</td></tr>
  
  <tr>
    <td width="10%" height="50">Source</td>
    <td>RT@ <input type="text" name="retweet_username" size="60" value="<?php echo $result['retweet_username'];?>"></td>
  </tr>
 <tr>
    <td width="20%"></td>
    <td><input type="submit" name="Submit" value="Save Changes"></td>
  </tr>
</table>
</form>


<?


}
?>
<?php
function wp_select()
{
 
$sql="select * from wp_twitter_setting";
$query=mysql_query($sql);
$result=mysql_fetch_array($query);
$retweet_username=$result['retweet_username'];

 $_SESSION['site_url']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

     $short_url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

 $url_value="http://".$_SERVER['HTTP_HOST'].'/';


?>
<body>
<script language="javascript" type="text/javascript" src="<?php echo $url_value;?>wp-content/plugins/TweetLighter/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $url_value;?>wp-content/plugins/TweetLighter/wp-onselect.js"></script>
<div id="quitetwite" style=" top:270px;  left:31%; position:fixed; padding-top:10px; display:none;"><a onClick="return showtwite();" style="cursor:pointer;"><img src="<?php echo $url_value;?>wp-content/plugins/TweetLighter/images/tweet.gif" alt="Sign in with Twitter"/></a></div>


<div style="width:646px; top:280px;  left:25%; height:200px; width:500px;;position:fixed;float:left;display:none;" id="select_value" >


<form name="formtwitter" action="./wp-content/plugins/TweetLighter/redirect.php" method="post">


<p><textarea id="selecttext"  name="selecttext"  cols="50" rows="5" onKeyUp="return charatervalue();" ></textarea></p>

<input type="hidden" name="retweet_username" id="retweet_username" value="<?php echo $retweet_username;?>" />
<input type="hidden" name="birtlyurl" id="birtlyurl" value="<?php echo trim($short_url)?>" />

</p>


</form>




</div>

<?php
 

}


?>
