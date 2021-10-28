<?php
//Task2
$fileInHtml = file_get_contents('https://pnu.edu.ua/phone_book_pnu/');
preg_match_all("<td .* style=\"width: 32.0388%\">.*\\n([А-ЯІЄЮЙ]*).*\\n*([А-ЯІЄЮЙ]*.*) ([А-ЯІЄЮЙ].*)<.*\\n.*<td.*26\\.2136.*>(\\+\\d{2}\\(\\d{4}\\)\\d{2}-\\d{2}-\\d{2})", $fileInHtml, $matches);

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
