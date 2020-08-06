<?php

{
//form is submitted receive the post data
$merged_file_name =""
$parts_num =trim($_POST['parts']);
function merge_file($merged_file_name,$parts_num)
{
$content='';
//put splited files content into content
for($i=0;$i<$parts_num;$i++)
{
$file_size = filesize('Download/part_'.$i);
$handle    = fopen('Download/part_'.$i, 'rb') or die("error opening file");
$content  .= fread($handle, $file_size) or die("error reading file");
}
//write content to merged file
$handle=fopen($merged_file_name, 'wb') or die("error creating/opening merged file");
fwrite($handle, $content) or die("error writing to merged file");
return 'OK';
}//end of function merge_file
//Set the merged file name
//call merge_file() function to merge the splited files
merge_file($merged_file_name,$parts_num) or die('Error merging files');
echo '<br>Files merged succesfully.';
}
?>