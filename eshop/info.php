<?php 
/*$data = file_get_contents('https://www.worldometers.info/coronavirus/');
echo $data;*/
include("simple_html_dom.php");

// Create DOM from URL
$html = file_get_html('http://slashdot.org/');

// Find all article blocks
foreach($html->find('div.maincounter-number') as $article) {
    $item['span']     = $article->find('div.maincounter-number', 0)->plaintext;

    $articles[] = $item;
}

print_r($articles);
?>