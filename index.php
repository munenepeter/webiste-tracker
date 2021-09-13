<?php
require_once "src/simple_html_dom.php";
require_once "src/class.Diff.php";
require_once "src/functions.php";

echo "Hi, Just started retrieving your files" . PHP_EOL . 'Please hold on....' . PHP_EOL;
echo progress_bar(10, 20);
// sample for exmaples http://help.websiteos.com/websiteos/example_of_a_simple_html_page.htm

//where to store the file with folder & add a date as a unque identifier
// $filename = 'Data/'.date("Y-m-d 01:00:00") . '.txt';
// $dirname = dirname($filename);
if (!$sock = @fsockopen('www.google.com', 80)) {
    echo 'Not Connected, Please try again later';
    exit;
}
$filename = date("Ymdhisa") . '.html';
$myfile = fopen($filename, "ws") or die("Unable to open file!");
$content  = file_get_html('http://help.websiteos.com/websiteos/example_of_a_simple_html_page.htm');

fwrite($myfile, $content);
fclose($myfile);

echo "Successfully Fetched the data". PHP_EOL;


//Check the two files for changes please refer here
//https://code.iamkate.com/php/diff-implementation/
$changesfilename = '20210620062405pm&20210620054847pmChange.html';

$fileChanges = fopen($changesfilename, "ws") or die("Unable to open file!");
$differences = Diff::toHTML(Diff::compareFiles($filename, '20210913062534pm'));


fwrite($fileChanges, $differences);
fclose($fileChanges);

echo "Finished checking for changes". PHP_EOL;
echo "Check your changes by opening this file". PHP_EOL;
