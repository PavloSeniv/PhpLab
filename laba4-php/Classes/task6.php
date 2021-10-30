<?php
//Task2
$fileInHtml = file_get_contents('../Files/task6.txt');
preg_match_all("/([A-Z][a-z] + [A-Z][a-z]+\\s*)|([А-ЯІЇ][а-яії] + [А-ЯІЇ][а-яії]+\\s?)/", $fileInHtml, $matches);

$urls = $matches[1];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Out</title>' . '</head>';
echo '<body>';

echo '<table border="1">';

for ($i = 0; $i < count($urls); $i++) {
  echo '<tr>';
  echo '<td>' . $i;
  echo '<td>' . $urls[$i] . '</td>';
  echo '</td>';
  echo '</tr>';
}

echo '</table>';
echo '</body>';
echo '</html>';
