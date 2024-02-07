<?php
    $host = 'localhost';
    $dbname = 'tasktracker';
    $user = 'root';
    $password = '';

    try {
        $LIGACAO = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

        return $LIGACAO;
    } catch(PDOException $e) {
        echo 'Erro durante a conexão à BD';
        exit();
    }
?>