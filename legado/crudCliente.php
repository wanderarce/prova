<?php

include "conecta.php";

$acao = $_POST["acao"];

$mensagem = "";

switch ($acao) {
    case "inserir":

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

        break;
    case "editar":
        $stmt = $pdo->prepare('UPDATE cliente SET nome = :nome, telefone = :telefone, idade = :idade where id = :id;');
        $stmt->execute([
                           ':id'       => $_POST["id"],
                           ':nome'     => $_POST["nome"],
                           ':telefone' => $_POST["telefone"],
                           ':idade'    => $_POST["idade"]
                       ]);
        $mensagem = "Cliente atualizado com sucesso";
        break;
}

header("Location: /front/cliente/lista.php?mensagem=$mensagem");