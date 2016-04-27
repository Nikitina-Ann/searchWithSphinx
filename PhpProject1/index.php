<html>
    <head>
        <title>Поиск слов</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <form action="http://localhost/PhpProject1/index.php" method="GET">
            Слова: <input id="words" type=text name=word><input id="search"  type=submit value="Поиск">
            </form>
        </div>
    </body>
</html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php    
            include('SearchWithSphinx.php');
           /* Аргументы:
            * /home/ann/api/sphinxapi.php - путь к sphinxapi.php
            * localhost - IP-адрес 
            * 9312 - TCP-порт демона searchd
            * key_word - столбец, по которому должен производиться поиск
            */
            $client = new SearhWithSphinx("/home/ann/api/sphinxapi.php", "localhost", 9312, 'key_word');
            //поиск слова
            $client->searchWord($_GET['word']); 
        ?>
    </body>
</html>
