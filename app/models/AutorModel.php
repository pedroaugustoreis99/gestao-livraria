<?php 

namespace models; 

use system\Database;

class AutorModel extends Database 
{ 
    public function returnaTodosOsAutores()
    {
        $sql = 'SELECT id, nome, DATE_FORMAT(data_nascimento, "%d/%m/%Y") AS data_nascimento, nacionalidade, biografia FROM autores';
        $autores = $this->execute_query($sql);
        return $autores->results;
    }

    public function existeNomeCadastrar($nome)
    {
        $sql = 'SELECT nome FROM autores WHERE nome = :nome';
        $params = [':nome' => $nome];
        $result = $this->execute_query($sql, $params);
        if ($result->affected_rows == 0) return false;
        return true;
    }

    public function existeNomeAtualizar($id, $nome)
    {
        $sql = 'SELECT nome FROM autores WHERE nome = :nome AND id <> :id';
        $params = [
            ':id' => $id,
            ':nome' => $nome
        ];
        $result = $this->execute_query($sql, $params);
        if ($result->affected_rows == 0) return false;
        return true;
    }

    public function cadastrar_autor($nome, $data_nascimento, $nacionalidade, $biografia)
    {
        $stmt = "
            INSERT INTO autores (nome, data_nascimento, nacionalidade, biografia, created_at, updated_at)
            VALUES (:nome, :data_nascimento, :nacionalidade, :biografia, NOW(), null);
        ";
        $params = [
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':nacionalidade' => $nacionalidade,
            ':biografia' => $biografia
        ];
        return $this->execute_non_query($stmt, $params);
    }
}