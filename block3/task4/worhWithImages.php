<?php
function is_photo($f_name){
    $allowed_types=array("jpg", "png", "gif", "jpeg");
    $extension = strtolower(array_pop(explode(".",$f_name)));
    return in_array($extension, $allowed_types);
}

function copy_images($from, $to){
    $files = scandir($from);
    for ($i = 0; $i < count($files); $i++) {
        if (($files[$i] != ".") && ($files[$i] != "..")and is_photo($files[$i])) {
            if (!copy($from.$files[$i], $to.$files[$i])) {
                echo "не удалось скопировать $files[$i] <br>";
            }
        }    
    }
}

function print_images($pref){       
    $files = scandir($pref);
    for ($i = 0; $i < count($files); $i++) {
        if (($files[$i] != ".") and ($files[$i] != "..") and is_photo($files[$i])) {
            $path = "/images/" . $files[$i];
            echo "<a href='$path'>";
            echo "<img src='$path' alt='' width='400' >";
            echo "</a>";
        }    
        
    }
}  
?>