<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Seniv Pavlo, https://github.com/PavloSeniv">
    <meta name="copyright" content="Seniv Pavlo">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap"
          rel="stylesheet">
    <title>Laba5</title>
    <!-- ======== Style ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php

if (!isset($_POST['file']) && !isset($_POST['submit1'])) {
    echo "<div class='container'>";

    echo "<table border='1' cellspacing='0'><form method='POST'>";
    echo "<h1 class='display-5 fw-bold'> Виберіть kml/gpx файл</h1>";
    echo "<input class='w-50 form-control form-control-lg' type='file' id='file' name='file'>";
    echo "<p><input class='btn btn-dark' type='submit' value='Відкрити' onclick='return check_file()' name='submit'>";
    echo "</form></table></div>";
} else {

    function transfer_coordinates($in_x, $in_y, $in_accuracy)
    {
        $x_l = -180;
        $x_r = 180;
        $y_t = 90;
        $y_b = -90;
        $code_of_coordinates = '';
        for ($i = 0; $i < $in_accuracy; $i++) {

            if ($in_x >= ($x_l + $x_r) / 2 && $in_y >= ($y_t + $y_b) / 2) {
                $code_of_coordinates .= 'A';
                $x_l = ($x_l + $x_r) / 2;
                $y_b = ($y_t + $y_b) / 2;
            } else if ($in_x < ($x_l + $x_r) / 2 && $in_y > ($y_t + $y_b) / 2) {
                $code_of_coordinates .= 'B';
                $x_r = ($x_l + $x_r) / 2;
                $y_b = ($y_t + $y_b) / 2;
            } else if ($in_x <= ($x_l + $x_r) / 2 && $in_y <= ($y_t + $y_b) / 2) {
                $code_of_coordinates .= 'C';
                $x_r = ($x_l + $x_r) / 2;
                $y_t = ($y_t + $y_b) / 2;
            } else if ($in_x > ($x_l + $x_r) / 2 && $in_y < ($y_t + $y_b) / 2) {
                $code_of_coordinates .= 'D';
                $x_l = ($x_l + $x_r) / 2;
                $y_t = ($y_t + $y_b) / 2;
            }
        }
        return $code_of_coordinates;
    }

    $file_name = $_POST['file'];
    $f = explode('.', $file_name);
    $file_extension = $f[count($f) - 1];

    $doc = new DOMDocument();
    $doc->load($_POST['file'], LIBXML_NOWARNING);

    if ($file_extension == 'kml') $trecks = $doc->getElementsByTagName("LookAt");
    else if ($file_extension == 'gpx') {
        $trecks = $doc->getElementsByTagName("trkpt");
    }
    $name = 1;
    $coordinate = [];
    foreach ($trecks as $coordinates) {
        if ($file_extension == 'kml') {
            $longitude_s = $coordinates->getElementsByTagName("longitude");
            $longitude = $longitude_s->item(0)->nodeValue;

            $latitude_s = $coordinates->getElementsByTagName("latitude");
            $latitude = $latitude_s->item(0)->nodeValue;

        } else if ($file_extension == 'gpx') {
            $longitude = $coordinates->getAttribute("lon");
            $latitude = $coordinates->getAttribute("lat");
        }
        $code_of_coor = transfer_coordinates($longitude, $latitude, 18);// в таблию записати із символами
        if ($name == 1) {
            $coordinate[$name] = [$longitude, $latitude, $code_of_coor];
            $name++;
        } else if (($coordinate[$name - 1][2] != $code_of_coor)) {
            $coordinate[$name] = [$longitude, $latitude, $code_of_coor];
            $name++;
        }
    }

    //записуємо в хмл
    $xml_file = new DomDocument('1.0', 'utf-8');
    $Coordinates = $xml_file->appendChild($xml_file->createElement('Coordinates'));
    echo "<div class='container-2'>";
    echo "<h2 class='fs-1 pt-5'>Координати з $file_extension-файлу</h2>";
    echo "<table class='container-table table table-dark table-striped table-hover' border='1' cellpadding='3' cellspacing='0'> <tr><th class='d-flex justify-content-center'><b>ID</b></th>";
    echo "<th><b>Довгота</b></th><th><b>Широта</b></th><th><b>Символьний рядок</b></th></tr>";

    foreach ($coordinate as $num => $value) {
        $geolocation = $Coordinates->appendChild($xml_file->createElement('geolocation'));

        $name = $geolocation->appendChild($xml_file->createAttribute('id'));
        $name->value = $num;
        $geolocation->appendChild($name);

        $longitude = $geolocation->appendChild($xml_file->createElement('longitude'));
        $longitude->appendChild($xml_file->createTextNode($coordinate[$num][0]));

        $latitude = $geolocation->appendChild($xml_file->createElement('latitude'));
        $latitude->appendChild($xml_file->createTextNode($coordinate[$num][1]));

        $code_of_coor = $geolocation->appendChild($xml_file->createElement('code_of_coor'));
        $code_of_coor->appendChild($xml_file->createTextNode($coordinate[$num][2]));
        echo "<tr><td align='center'>$num</td><td>" . $coordinate[$num][0] . "</td>";
        echo "<td>" . $coordinate[$num][1] . "</td><td>" . $coordinate[$num][2] . "</td></tr>";
    }
    echo "</table>";


    $xml_file->formatOutput = true;
    $xml_file->save('Data.xml');

    echo "<div class='pb-5 fs-1'> Дані успішно збережені в Data.xml  </div>";
    echo "<a class='btn btn-dark mb-5' href='index.php'>Головна</a>";

    echo "</div>";

}
?>

<script src="js/main.js"></script>

</body>
</html>
