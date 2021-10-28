<?php
//Task2
$fileInHtml = file_get_contents('https://pnu.edu.ua/phone_book_pnu/');
preg_match_all("#<div\s+id="t\d+">[^<>]*(<div[^>]*>(?:[^<>]*|(?1))*</div>)[^<>]*</div>#si", $fileInHtml, $matches);

$urls = $matches[1];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Out</title>' . '</head>';
echo '<body>';

echo '<table border="1">';

for ($i = 0; $i < count($urls); $i++) {
  echo '<tr>';
  echo '<td>' . $i;
  echo '<td>' . "https://" . $urls[$i] . '</td>';
  echo '</td>';
  echo '</tr>';
}

echo '</table>';
echo '</body>';
echo '</html>';
