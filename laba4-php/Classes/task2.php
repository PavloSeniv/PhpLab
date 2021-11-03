<?php
//Task2
$fileInHtml = file_get_contents('https://pnu.edu.ua/phone_book_pnu/');

preg_match_all('/<td .* style=\"width: \\d{2}.\\d{4}%\">.*\\n([А-ЯІЄЮЙ]*).*\\n*([А-ЯІЄЮЙ]*.*) ([А-ЯІЄЮЙ].*)<.*\\n.*<td.*\\d{2}\\.\\d{4}.*>(\\+\\d{2}\\(\\d{4}\\)\\d{2}-\\d{2}-\\d{2})/', $fileInHtml, $matches);
$urls = $matches[0];

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task2</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
echo '<body class="container-task">';

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
