<?php
include 'defines.php';
echo $_FILES['file']['name'];
if (!empty($_FILES['file']['name']))
{
    $file = $_FILES['file'];
    $name = $file['name'];
    $path = SAVE_DIR . $name;

    if (!move_uploaded_file($file['tmp_name'], $path))
        echo 'Не удалось загрузить файл';
}

header("Location: \index.php");
?>