<?php
//Task3
$fileInHtml = file_get_contents('../Files/task3.txt');
preg_match_all("/трав.*?(\\s|$|\\Z|\\-)|берез.*?(\\s|$|\\Z|\\-)|лют.*?(\\s|$|\\Z|\\-)|квіт.*?(\\s|$|\\Z|\\-)|черв.*?(\\s|$|\\Z|\\-)|лип.*?(\\s|$|\\Z|\\-)|cерп.*?(\\s|$|\\Z|\\-)|верес.*?(\\s|$|\\Z|\\-)|жовт.*?(\\s|$|\\Z|\\-)|листопад.*?(\\s|$|\\Z|\\-)|грудн.*?(\\s|$|\\Z|\\-)/", $fileInHtml, $matches);
$urls = $matches[0];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task3</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
echo '<body class="container-task-1">';

echo '<table border="1">';

for ($i = 0; $i < count($urls); $i++) {
  echo '<tr>';
  echo '<td>' . $i;
  echo '<td>' . $urls[$i] . '</td>';
  echo '<td>' . str_replace($matches[0], "січня ", $fileInHtml) . '</td>';

  echo '</td>';
  echo '</tr>';
}

echo '</table>';
echo '</body>';
echo '</html>';
