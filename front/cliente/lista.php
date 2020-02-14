<?php
include "../cabecalho.php";
include "../../legado/conecta.php";

$consulta = $pdo->query("SELECT * FROM cliente;");
$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);

$mensagem = $_GET["mensagem"] ?? "";

if ($mensagem != "") {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo $mensagem ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col s12">
                        <h1>Lista de clientes</h1>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col s12">
                        <form>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="ID">
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control" placeholder="Nome do cliente">
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success">Buscar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col s12">
                        <a href="formulario.php" class="btn btn-primary float-right">Adicionar cliente</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome do cliente</th>
                                <th scope="col">Idade</th>
                                <th scope="col">Número do telefone</th>
                                <th scope="col">Editar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($clientes as $cliente) :
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $cliente["id"]; ?></th>
                                    <td><?php echo $cliente["nome"]; ?></td>
                                    <td><?php echo $cliente["idade"]; ?></td>
                                    <td><?php echo $cliente["telefone"]; ?></td>
                                    <td><a href="/front/cliente/formulario.php?id=<?php echo $cliente["id"]; ?>"><i
                                                    class="fas fa-edit"></i></a></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include "../rodape.php";