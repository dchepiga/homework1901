<?php

$fileName = "downloads/" . $_GET['image'];

$statisticFile = 'statistics.txt';
$statContent = file_get_contents($statisticFile);
$statContent = unserialize($statContent);

$needle = basename($fileName);

foreach ($statContent as $key => &$stat) {
    if ($stat['filename'] == $needle) {
        $stat['downloadCount']++;
    }
}

$statContent = serialize($statContent);
file_put_contents($statisticFile, $statContent);

if (file_exists($fileName)) {
    header('Content-Description: File Transfer');
    header('Content-Type: '.getimagesize($fileName)['mime']);
    header('Content-Disposition: attachment; filename="' . basename($fileName) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileName));
    readfile($fileName);

    exit;

}