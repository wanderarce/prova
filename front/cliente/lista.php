<?php
include "../cabecalho.php";
include "../../legado/conecta.php";

$query = "SELECT * FROM cliente ";

$id = $_GET["id"] ?? "";
$nome = $_GET["nome"] ?? "";

if(!empty($id) || !empty($nome)) {
    
    $query = $query." WHERE ";
    if(!empty($id) && !empty($nome)) {
        $query = $query." id = ? AND nome LIKE CONCAT('%', ?, '%') " ;
        $consulta = $pdo->prepare($query);
        $consulta->execute([$id ,$nome]);
    }
    if(!empty($id) && empty($nome)) {
        $query = $query." id = ? " ;
        $consulta = $pdo->prepare($query);
        $consulta->execute([$id]);
    }    
    if(!empty($nome) && empty($id)) {
        $query = $query."  nome LIKE CONCAT('%', ?, '%') " ;
        $consulta = $pdo->prepare($query);
        $consulta->execute([$nome]);
    }
} else {
    $consulta = $pdo->prepare($query);
    $consulta->execute();
}


$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);
if(sizeof($clientes) <1) {
    $mensagem = "Nenhum registro encontrado com esses parâmetros";
    header("Location: lista.php?mensagem=$mensagem");
}


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
                        <form   method="get" action="lista.php?id=<?php echo $id; ?>&nome=<?php echo $nome; ?>" enctype="multipart/form-data">
                        
                            <div class="form-row">
                                <div class="col">
                                    <input type="number" min="1" step="1" class="form-control"
                                     name="id" placeholder="ID" value="<?php echo $id ?>">
                                </div>
                                <div class="col-7">
                                    <input type="text" class="form-control"  name="nome" 
                                    value="<?php echo $nome ?>" placeholder="Nome do cliente">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                    Buscar</button>
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
                            if(sizeof($clientes)>0) :
                                foreach ($clientes as $cliente) :
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $cliente["id"]; ?></th>
                                        <td><?php echo $cliente["nome"]; ?></td>
                                        <td><?php echo $cliente["idade"]; ?></td>
                                        <td><?php echo $cliente["telefone"]; ?></td>
                                        <td><a href="formulario.php?id=<?php echo $cliente["id"]; ?>"><i
                                                        class="fas fa-edit"></i></a></td>
                                    </tr>
                                <?php
                                endforeach;
                            endif;
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