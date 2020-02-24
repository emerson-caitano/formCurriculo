<?php 
    require_once("dao/db.php");

    
    class Competencia {
        public $competencia;
        public $descricao;
        public $usuario;
    
        function salvar($descricao, $usuario){
            // salvar no banco
            // retornar id
        }

        function alterar($competencia, $descricao, $usuario){
            // alterar por id
            // retornar positivo
        }

        function listar($usuario){
        global $mysqli;

            // consultar e retornar todos
            $sql = "SELECT * FROM competencias WHERE usuario ='{$usuario}'";
            $result = $mysqli->query($sql);
            $listaDeCompetencias = [];
            while ($competencia = $result->fetch_assoc()) { 
                $listaDeCompetencias[] = $competencia;
            }
            return $listaDeCompetencias;
        
        }

        function excluir($competencia){
            // excluir por id
            // retornar positivo
        }
    }
    