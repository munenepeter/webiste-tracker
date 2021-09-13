<?php
require_once "src/simple_html_dom.php";
require_once "src/class.Diff.php";
require_once "src/functions.php";


echo "Hi, Just started retrieving your files"
      . PHP_EOL . 
      'Please hold on....' 
      . PHP_EOL;


for ($i = 0; $i < 20 ; $i++) {
 echo progress_bar($i, 20);
}

checkInternet();

$url = "http://help.websiteos.com/websiteos/example_of_a_simple_html_page.htm";

$time  = date("Ymdhisa");
$fileOriginHost = getHost($url);
$filename = $fileOriginHost . $time . '.html';

echo  $filename;

exit;

$myfile = fopen($filename, "ws") or die("Unable to open file!");
$content  = file_get_html($url);

fwrite($myfile, $content);
fclose($myfile);

echo "Successfully Fetched the data". PHP_EOL;

//Check if the file to be compared with is present
//if not just  initliaze and exit;



//Check the two files for changes please refer here
//https://code.iamkate.com/php/diff-implementation/
$changesfilename = '20210620062405pm&20210620054847pmChange.html';

$fileChanges = fopen($changesfilename, "ws") or die("Unable to open file!");
$differences = Diff::toHTML(Diff::compareFiles($filename, '20210913062534pm'));


fwrite($fileChanges, $differences);
fclose($fileChanges);

echo "Finished checking for changes". PHP_EOL;
echo "Check your changes by opening this file". PHP_EOL;
