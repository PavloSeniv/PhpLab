<?php
//Task4
$fileInHtml = file_get_contents('../Files/task4.txt');
preg_match_all("/(((([0-3][0-1])|([0-2][0-9]))-((([0-1][0-2])|(0[0-9]))|(січ[а-яі]+|лют[а-яі]+|бер[а-яі]+|квіт[а-яі]+|трав[а-яі]+)|черв[а-яі]+|лип[а-яі]+|серпн[а-яі]+|верес[а-яі]+|жовт[а-яі]+|листоп[а-яі]+|груд[а-яі]+)-(\\d{1,4}))|((([0-3][0-1])|([0-2][0-9]))-((([0-1][0-2])|(0[0-9]))|(січ[а-яі]+|лют[а-яі]+|бер[а-яі]+|квіт[а-яі]+|трав[а-яі]+)|черв[а-яі]+|лип[а-яі]+|серп[а-яі]+|верес[а-яі]+|жовт[а-яі]+|листоп[а-яі]+|груд[а-яі]+)))/", $fileInHtml, $matches);

$urls = $matches[1];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task4</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
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
