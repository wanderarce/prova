<?php

include "conecta.php";

$acao = "";
if(isset($_POST["acao"]))
    $acao = $_POST["acao"];
if(isset($_GET["acao"]))
    $acao = $_GET["acao"];

$mensagem = "";

switch ($acao) {
    case "inserir":
        inserir($pdo);
        break;
    case "editar" :
        editar($pdo);
        break;
}
    function inserir($pdo) {
        try {
            $stmt = $pdo->prepare('INSERT INTO cliente (nome, telefone, idade) VALUES (:nome, :telefone, :idade)');
            $stmt->execute([
                               ':nome'     => $_POST["nome"],
                               ':telefone' => $_POST["telefone"],
                               ':idade'    => $_POST["idade"]
                           ]);

            $mensagem = "Cliente cadastrado com sucesso";

        } catch (PDOException $e) {
            $mensagem = 'Error: ' . $e->getMessage();
        }

    }

    function editar($pdo) {
        try {
            $stmt = $pdo->prepare('UPDATE cliente SET nome = :nome, telefone = :telefone, idade = :idade where id = :id;');
            $stmt->execute([
                               ':id'       => $_POST["id"],
                               ':nome'     => $_POST["nome"],
                               ':telefone' => $_POST["telefone"],
                               ':idade'    => $_POST["idade"]
                           ]);
            $mensagem = "Cliente atualizado com sucesso";
            this.renderPage($mensagem);
    
        } catch (PDOException $e) {
            $mensage = 'Error '.$e->getMessage();
        }
    }

    function renderPage($mensagem) {
        header("Location: ../front/cliente/lista.php?mensagem=$mensagem");
    }
