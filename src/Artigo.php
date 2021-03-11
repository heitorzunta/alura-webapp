<?php

require_once 'connection.php';

class Artigo {
	private mysqli $mysql;

	public function __construct(mysqli $mysql) {
		$this->mysql = $mysql;
	}

	public function exibirTodos(): array
	{
		$consulta = 'SELECT id, titulo, conteudo FROM artigos';
		$resultado = $this->mysql->query($consulta);
		$artigos = $resultado->fetch_all(MYSQLI_ASSOC);
		return $artigos;
	}

	public function encontrarCorpoArtigo(string $id): array{

		# Usando a sintaxe anti mysql injection
		$sql = 'SELECT id, titulo, conteudo FROM artigos WHERE id LIKE ?';
		$consultaArtigo = $this->mysql->prepare($sql);
		$consultaArtigo->bind_param('s', $id);
		$consultaArtigo->execute();
		$artigo = $consultaArtigo->get_result()->fetch_assoc();
		return $artigo;
	}

	public function adicionarArtigo(string $titulo, string $conteudo): void{
		$sql = 'INSERT INTO artigo (titulo, conteudo) VALUES (?,?)';
		$requisicao = $this->mysql->prepare($sql);
		$requisicao->bind_param('ss', $titulo, $conteudo);
		$requisicao->execute();
	}
}
