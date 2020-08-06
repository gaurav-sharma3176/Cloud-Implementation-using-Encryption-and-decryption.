<?php


merge file:

{
//form is submitted receive the post data
$merged_file_name ="rohan.pdf"
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





split file:
$file_name = trim($_POST['filenametosplit']);
$maximumuploadlimit = trim($_POST['maxuploadlimit']);
//compute the number of parts
$filesize = ((filesize($file_name))/1000);
$parts_num = ($filesize/$maximumuploadlimit)*2;
$parts_num= floor($parts_num);
function splitthisfile($file_name,$parts_num)
{
$handle = fopen($file_name, 'rb') or die("error opening file");
$file_size =filesize($file_name);
$parts_size = floor($file_size/$parts_num);
$modulus=$file_size % $parts_num;
for($i=0;$i<$parts_num;$i++)
{
if($modulus!=0 & $i==$parts_num-1)
$parts[$i] = fread($handle,$parts_size+$modulus) or die("error reading file");
else
$parts[$i] = fread($handle,$parts_size) or die("error reading file");
}
//close file handle
fclose($handle) or die("error closing file handle");
//writing to splitted files
$nnnn = array("2k6l6m9o1u7f3k2i1y1e0m6r0q5d5m","0j5p8u5c0e4p5w7d5u3i6f9h2z2q8m","8j7n6e7l2c0d5t2x9f7p4c1o5m6q2z","9f0q4a7d6n8m8n5h8i0r8v4g4i1b8s","2s9h0h9y6l3z4f6g3f3c0n7k2t5l6z","0d0u8t9i2f3d9u7i2j1m6g8t5j9q6y","9h0y6h6p7t5v0f4z0v6v7e8u5i2r5x","5v1z9c2d2v4n6w5r8n1s0s2f9s1h7k","0n3c1a7q6j7l9r6g9m0m1y2y5q8z6q","2m3o0s1l4o9z1k3e5a2r1u0o3o8k7q");
for($i=0;$i<$parts_num;$i++)
{
$handle = fopen($nnnn[$i], 'wb') or die("error opening file for writing");
fwrite($handle,$parts[$i]) or die("error writing splited file");
}
//close file handle
fclose($handle) or die("error closing file handle");
return 'OK';
}
splitthisfile($file_name,$parts_num) or die('Error spliting file');
?>
