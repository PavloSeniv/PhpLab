<?php
//Task1
$fileInHtml = file_get_contents('../in.html');
preg_match_all("/<[Aa][\s]{1}[^>]*[Hh][Rr][Ee][Ff][^=]*=[ '\"\s]*([^ \"'>\s#]+)[^>]*>/", $fileInHtml, $matches);
$urls = $matches[1];


ob_start();

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task1</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
echo '<body class="container-task">';

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

$tableOut = ob_get_clean();  // получаем html этой таблицы

// Записываем таблицу в файл
file_put_contents('../out.html', $tableOut);


echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task1</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
echo '<body class="container-task-1">';

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
