<?php
include "../cabecalho.php";
include "../../legado/conecta.php";

$id = $_GET["id"] ?? "";

$acao = "inserir";

if ($id != "") {
    $consulta  = $pdo->query("SELECT * FROM cliente WHERE id = $id;");
    $qr        = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $resultado = $qr[0];
    $acao      = "editar";

}
?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Cadastro de cliente</h1>
                <form action="../../legado/crudCliente.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                    <input type="hidden" name="id" value="<?php echo $resultado['id'] ?? "" ?>">

                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" required
                                       value="<?php echo $resultado['nome'] ?? "" ?>" placeholder="Nome do cliente">
                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="idade">Idade</label>
                                <input type="number" class="form-control" id="idade" name="idade" required
                                       value="<?php echo $resultado['idade'] ?? "" ?>"
                                       placeholder="Idade do cliente">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" required
                                       value="<?php echo $resultado['telefone'] ?? "" ?>"
                                       placeholder="Telefone do cliente">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

<?php
include "../rodape.php";