<?php
/**
 * Поиск слов с помощью инструмента Sphinx
 *
 * @author ann
 */
class SearhWithSphinx {
    private $cl;
    private $column;
   /* Конструктор
    * $pathSphinxApi - путь к sphinxapi.php
    * $server - IP-адрес 
    * $port - TCP-порт демона searchd
    * $column - столбец, по которому должен производиться поиск
    */
    function __construct($pathSphinxApi, $server, $port, $column) {
        //подключение sphinxapi.php
        include($pathSphinxApi);
        //создание клиента и подключение его к демону
        $this->cl = new SphinxClient();
        $this->cl->SetServer( $server, $port);
        //запрос рассматривается как выражение с использованием внутреннего языка запросов Sphinx.
        $this->cl->SetMatchMode(SPH_MATCH_EXTENDED);
        $this->column = $column;
    }
    //изменить столбец, по которому осуществляется поиск
    function setColumn($column) {
        $this->column = $column;
    }
    //поиск слова
    function searchWord($request) {
        // поисковый запрос по столбцу key_word - ключ БЗ
        $result = $this->cl->Query("@$this->column {$request}");
        // обработка результатов запроса
        if ( $result != false ) {
            // выводим предупреждение если оно было
            if ( $this->cl->GetLastWarning() ) 
                echo "Предупреждение: " . $this->cl->GetLastWarning();
            if ( ! empty($result["matches"]) )  // если есть результаты поиска - обрабатываем их
                foreach ( $result["matches"] as $id => $info) 
                    foreach ( $info["attrs"] as $key=> $answer)
                        echo "{$answer}<br/>"; //выводим поле answer подходящих строк
        }
    }
}
?>