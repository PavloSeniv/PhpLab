<?php
//Task2
$fileInHtml = file_get_contents('../Files/task3.txt');
preg_match_all("(\\d{1,2}) (лют[а-яі]*|берез[а-яі]*|квіт[а-яі]*|трав[а-яі]*|черв[а-яі]*|лип[а-яі]*|серп[а-яі]*|верес[а-яі]*|жовт[а-яі]*|листопад[а-яі]*|груд[а-яі]*)*", $fileInHtml, $matches);

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
