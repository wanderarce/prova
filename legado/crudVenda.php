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

        try {
            $stmt = $pdo->prepare('INSERT INTO venda (recarga, telefone, cliente_id) VALUES (:recarga, :telefone, :cliente_id)');
            $stmt->execute([
                               ':recarga'     => $_POST["recarga"],
                               ':telefone' => $_POST["telefone"],
                               ':cliente_id'    => $_POST["cliente_id"]
                           ]);

            $mensagem = "Recarga cadastrada com sucesso";

        } catch (PDOException $e) {
            $mensagem = 'Error: ' . $e->getMessage();
        }

        break;
    case "editar" :
        try {
            $stmt = $pdo->prepare('UPDATE venda SET recarga = :recarga, telefone = :telefone, cliente_id = :cliente_id where id = :id;');
            $stmt->bindValue(":id", $_POST["id"], PDO::PARAM_INT);
            $stmt->bindValue(":recarga", $_POST["recarga"], PDO::PARAM_STR);
            $stmt->bindValue(":telefone", $_POST["telefone"], PDO::PARAM_STR);
            $stmt->bindValue(":cliente_id", $_POST["cliente_id"], PDO::PARAM_INT);
            $stmt->execute();
                        //echo $stmt; die;
            $mensagem = "Recarga atualizada com sucesso";
        } catch (PDOException $e) {
            $mensagem = 'Error: ' . $e->getMessage();
        }
        break;
    case "excluir" :
        try {
            $stmt = $pdo->prepare('DELETE FROM venda WHERE id = :id;');
            $stmt->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
            $stmt->execute();
            $mensagem = "Recarga excluída com sucesso";
        } catch (PDOException $e) {
            var_dump($e->getTrace());
            var_dump($e->getMessage());die;
            $mensagem = 'Error: ' . $e->getMessage();
        }
        break;

}

header("Location: ../front/venda/lista.php?mensagem=$mensagem");