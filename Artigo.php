<?php

require_once 'connection.php';

class Artigo
{
    private mysqli $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {
        $consulta = 'SELECT id, titulo, conteudo FROM artigos';
        $resultado = $this->mysql->query($consulta);
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $artigos;
    }
}
