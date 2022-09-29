<?php
include ("defines.php");

$dir_for_load =  __DIR__ . DIR;

function cheсk_dir($dir) {
    if (!is_dir($dir)) {
        mkdir($dir);
    }
}

cheсk_dir($dir_for_load);
cheсk_dir(UPLOAD_DIR);
cheсk_dir(SAVE_DIR);


include ("worhWithImages.php");

copy_images(UPLOAD_DIR,  $dir_for_load );
copy_images(SAVE_DIR,  $dir_for_load );
print_images($dir_for_load);