<?php
$albumsDir = __DIR__ . '/albums';
$albums = [];

foreach (scandir($albumsDir) as $folder) {
    if ($folder === '.' || $folder === '..') continue;
    $folderPath = "$albumsDir/$folder";
    if (is_dir($folderPath)) {
        $images = [];
        foreach (scandir($folderPath) as $file) {
            if (preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file)) {
                $images[] = "albums/$folder/$file";
            }
        }
        if (!empty($images)) {
            $albums[$folder] = $images;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($albums);
