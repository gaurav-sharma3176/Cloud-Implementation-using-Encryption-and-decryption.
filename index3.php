<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
#imagelist{
border: thin solid silver;
float:left;
padding:5px;
width:auto;
margin: 0 5px 0 0;
}
p{
margin:0;
padding:0;
text-align: center;
font-style: italic;
font-size: smaller;
text-indent: 0;
}
#caption{
margin-top: 5px;
}
img{
height: 225px;
}
-->
</style>
Photo Archieve
<br />
<br />
<?php
include('config.php');
$result = mysql_query("SELECT * FROM photos");
while($row = mysql_fetch_array($result))
{
echo '<div id="imagelist">';
echo '<p><img src="'.$row['location'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
}
?>
