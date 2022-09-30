<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta  content="width=device-width, initial-scale=1" charset = "UTF-8">
    <title>Фотогалерея</title>
    <style>
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    </style>
</head>
<body>
    <form action="/addFile.php" method="POST", enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Загрузить">
    </form>
</body>
</html>

<? include 'main.php'; ?>