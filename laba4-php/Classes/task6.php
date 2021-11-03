<?php
//Task6
$fileInHtml = file_get_contents('../Files/task6.txt');
preg_match_all("/([A-Z][a-z]+ [A-Z][a-z]+\s*)|([А-ЯІҐЄЇ][а-яіґєї]+ [А-ЯІҐЄЇ][а-яіґєї]+\s)/u", $fileInHtml, $matches);

$urls = $matches[0];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task6</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
echo '<body class="container-task-1">';

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
