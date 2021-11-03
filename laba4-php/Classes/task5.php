<?php
//Task5
$fileInHtml = file_get_contents('../Files/task5.txt');
preg_match_all("/(чорний|білий)\s(пес|кіт)/", $fileInHtml, $matches);

$urls = $matches[1];
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task5</title>' . '<link rel="stylesheet" href="../css/style.css">' . '</head>';
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

// echo '<pre>' . print_r($matches, true) . '</pre>';

$whiteCat = 0;
$whiteDog = 0;
$blackDog = 0;
$blackCat = 0;

foreach ($matches as $val) {

  for ($i = 0; $i < count($val); $i++) {

    if ($val[$i] == 'білий пес') {
      $whiteDog++;
    }

    if ($val[$i] == 'чорний пес') {
      $blackDog++;
    }

    if ($val[$i] == 'білий кіт') {
      $whiteCat++;
    }

    if ($val[$i] == 'чорний кіт') {
      $blackCat++;
    }
  }
}

echo "Словосполучень білий пес: " . $whiteDog . '<br />';
echo "Словосполучень чорний пес: " . $blackDog . '<br />';
echo "Словосполучень білий кіт: " . $whiteCat . '<br />';
echo "Словосполучень чорний кіт: " . $blackCat . '<br />';
