<?php
include 'defines.php';

$dirForLoad =  __DIR__ . DIR;

function cheсkDir($dir)
{
    if (!is_dir($dir))
        mkdir($dir);
}

cheсkDir($dirForLoad);
cheсkDir(UPLOAD_DIR);
cheсkDir(SAVE_DIR);

include 'worhWithImages.php';

copy_images(UPLOAD_DIR,  $dirForLoad );
copy_images(SAVE_DIR,  $dirForLoad );
printImages($dirForLoad);