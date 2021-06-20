<?php
require_once "src/simple_html_dom.php";
require_once "src/class.Diff.php";

echo "Hi, Just started retrieving your files" . PHP_EOL . 'Please hold on....' . PHP_EOL;
// sample for exmaples http://help.websiteos.com/websiteos/example_of_a_simple_html_page.htm
//where to store the file
// $filename = 'Data/'.date("Y-m-d 01:00:00") . '.txt';
// $dirname = dirname($filename);

$filename = date("Ymdhisa") . '.html';
$myfile = fopen($filename, "ws") or die("Unable to open file!");
$content  = file_get_html('http://help.websiteos.com/websiteos/example_of_a_simple_html_page.htm');

fwrite($myfile, $content);
fclose($myfile);

echo "Successfully Fetched the data". PHP_EOL;
//we well get the diffrences please refer here
//https://code.iamkate.com/php/diff-implementation/
$Changesfilename = '20210620062405pm&20210620054847pmChange.html';

$FileChanges = fopen($Changesfilename, "ws") or die("Unable to open file!");
$differences = Diff::toHTML(Diff::compareFiles('20210620062405pm.html', '20210620054847pm.html'));


fwrite($FileChanges, $differences);
fclose($FileChanges);

echo "Finished checking for changes". PHP_EOL;
