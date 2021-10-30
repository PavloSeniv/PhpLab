<?php
//Task2
$fileInHtml = file_get_contents('../Files/task5.txt');
preg_match_all("/(чорний|білий)\s(пес|кіт)/", $fileInHtml, $matches);

$urls = $matches[1];
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>' . '<title>Task5</title>' . '</head>';
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

// echo '<pre>' . print_r($matches, true) . '</pre>';



foreach ($matches as $val) {
  $whiteCat = 0;
  $whiteDog = 0;
  $blackDog = 0;
  $blackCat = 0;

  for ($i = 0; $i < count($val); $i++) {

    if ($val[$i] == 'білий пес') {
      $whiteDog = 0;
      echo "Словосполучень білий пес: " . $whiteDog . '<br />';
    }

    if ($val[$i] == 'чорний пес') {
      $blackDog++;
      echo "Словосполучень чорний пес: " . $blackDog . '<br />';
    }

    if ($val[$i] == 'білий кіт') {
      $whiteCat++;
      echo "Словосполучень білий кіт: " . $whiteCat . '<br />';
    }

    if ($val[$i] == 'чорний кіт') {
      $blackCat++;
      echo "Словосполучень чорний кіт: " . $blackCat . '<br />';
    }
  }
}