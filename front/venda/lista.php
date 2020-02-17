<?php
include "../cabecalho.php";
include "../../legado/conecta.php"; 

$page = $_GET["page"] ?? 1;
$limit = 5;
$offset = $page == 1 ? 0 : $page;

$queryCount = "SELECT COUNT(*) AS registers  FROM venda v INNER JOIN cliente c ON c.id = v.cliente_id";
$count = $pdo->prepare($queryCount);
$count->execute();

$pages = $count->fetch(PDO::FETCH_ASSOC);
$total = $pages["registers"];
$registroPorPagina = 5;
$numeroDePaginas = ceil($total/$registroPorPagina);
$paginaInicial = ($registroPorPagina*$page)-$registroPorPagina;


$query = "SELECT v.id AS id, v.recarga AS recarga, v.telefone, c.nome AS nome FROM venda v INNER JOIN cliente c ON c.id = v.cliente_id LIMIT :limit OFFSET :offset";
$consulta = $pdo->prepare($query);
$consulta->bindValue(":limit", $limit * $page, PDO::PARAM_INT);
$consulta->bindValue(":offset", $offset, PDO::PARAM_INT);
$consulta->execute();

$vendas = $consulta->fetchAll(PDO::FETCH_ASSOC);

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
                        <h1>Lista de vendas</h1>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col s12">
                        <a href="formulario.php" class="btn btn-primary float-right">Adicionar venda</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome do cliente</th>
                                <th scope="col">Valor da Recarga</th>
                                <th scope="col">Numero do telefone</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                        if(sizeof($vendas) > 0) :
                            foreach($vendas as $venda) :
                                $valor  = str_replace(".", ",", $venda["recarga"]);
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $venda["id"]; ?></th>
                                    <td><?php echo $venda["nome"]; ?></td>
                                    <td><?php echo "R$ ".$valor; ?></td>
                                    <td> <?php echo $venda["telefone"]; ?></td>
                                    <td><a href="formulario.php?id=<?php echo $venda["id"]; ?>"><i
                                                        class="fas fa-edit"></i></a></td>
                                    <td>
                                    <a href="../../legado/crudVenda.php?acao=excluir&id=<?php echo $venda['id']; ?>" >
                                    <i class="fas fa-trash"></i>
                                    </a></td>
                                </tr>
                        <?php 
                            endforeach;
                        endif; 
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link <?php echo  $page <= 1 ? 'd-none' : ''; ?>" href="javascript:window.location.href='/prova/front/venda/lista.php?page=<?php echo $page-1 ?>'" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php 
                                for ($i= 1; $i <= $numeroDePaginas ; $i++) { 
                            ?>
                                <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                <a class="page-link" href="javascript:window.location.href='/prova/front/venda/lista.php?page=<?php echo $i ?>'"><?php echo $i; ?></a>
                                </li>
                            <?php        
                                }
                                
                            ?>
                            <li class="page-item <?php echo  $page >= $numeroDePaginas ? 'd-none' : ''; ?>">
                                <a class="page-link" href="javascript:window.location.href='/prova/front/venda/lista.php?page=<?php echo $page+1 ?>'" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
include "../rodape.php";