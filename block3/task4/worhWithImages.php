<?php
function isPhoto($f_name){
    $allowed_types=array('jpg', 'png', 'gif', 'jpeg');
    $extension = strtolower(array_pop(explode(".",$f_name)));
    return in_array($extension, $allowed_types);
}

function copy_images($from, $to){
    $files = scandir($from);
    for ($i = 0; $i < count($files); $i++) 
    {
        if (($files[$i] != ".") and ($files[$i] != "..") and isPhoto($files[$i])) 
            if (!copy($from.$files[$i], $to.$files[$i]))
            {
                echo 'не удалось скопировать ' . $files[$i] . "<br>";
            }   
    }
}

function printImages($pref)
{       
    $files = scandir($pref);
    for ($i = 0; $i < count($files); $i++)
    {
        if (($files[$i] != ".") and ($files[$i] != "..") and isPhoto($files[$i]))
        {
            $path = "/images/" . $files[$i];
            echo '<a href=' . $path . '>';
            echo '<img src=' . $path . ' alt=\'\' width=\'400\' >';
            echo '</a>';
        }         
    }
}  
?>