<?php

namespace app\site\model;

use app\core\Model;
use app\site\entitie\Receita;

class ReceitaModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Model();
    }

    public function insert(Receita $receita)
    {
        $sql = 'INSERT INTO receita (titulo, conteudo, thumb, tags, data_publicacao) VALUES (:titulo, :conteudo, :thumb, :tags, :datapublicacao)';
        $params = [
            ':titulo' => $receita->getTitulo(),
            ':conteudo' => $receita->getConteudo(),
            ':thumb' => $receita->getThumb(),
            ':tags' => $receita->getTags(),
            ':datapublicacao' => $receita->getDataPublicacao()
        ];

        if(!$this->pdo->ExecuteNonQuery($sql, $params))
            return -1;

        return $this->pdo->GetLastID();
        
    }

    public function readById(int $id)
    {
        $sql = 'SELECT * FROM receita WHERE id = :id';
        $param = [
            ':id' => $id
        ];

        $this->collection(
            $this->pdo->ExecuteQueryOneRow($sql, $param)
        );
    }

    private function collection($param)
    {
        return new Receita(
            $param['id'] ?? null,
            $param['titulo'] ?? null,
            $param['conteudo'] ?? null,
            $param['thumb'] ?? null,
            $param['tags'] ?? null,
            $param['data_publicacao'] ?? null
        );
    }
}