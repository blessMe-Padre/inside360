<?php
    $connect = new mysqli('localhost', 'root', '', '360_db');

    if(!$connect) {
        echo "Ошибка подключения к бд";
    }
?>