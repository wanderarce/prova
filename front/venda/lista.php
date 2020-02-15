<?php
include "../cabecalho.php";
include "../../legado/conecta.php"; 



$query = "SELECT * FROM venda ";
$consulta = $pdo->prepare($query);
$consulta->execute();
$vendas = $consulta->fetchAll(PDO::FETCH_ASSOC);
if(sizeof($vendas) <1) {
    $mensagem = "Nenhum registro encontrado com esses parâmetros";
    header("Location: lista.php?mensagem=$mensagem");
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
                        <?php
                        if(sizeof($vendas) > 0) :
                            foreach($vendas as $venda) :
                            endforeach;
                        endif; 
                        ?>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>José da Silva</td>
                                <td>R$ 5,00</td>
                                <td> (11) 99595-9595 </td>
                                <td><i class="fas fa-edit"></i></td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>José da Silva</td>
                                <td>R$ 5,00</td>
                                <td> (11) 99595-9595 </td>
                                <td><i class="fas fa-edit"></i></td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>José da Silva</td>
                                <td>R$ 5,00</td>
                                <td> (11) 99595-9595 </td>
                                <td><i class="fas fa-edit"></i></td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>José da Silva</td>
                                <td>R$ 5,00</td>
                                <td> (11) 99595-9595 </td>
                                <td><i class="fas fa-edit"></i></td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>José da Silva</td>
                                <td>R$ 5,00</td>
                                <td> (11) 99595-9595 </td>
                                <td><i class="fas fa-edit"></i></td>
                                <td><i class="fas fa-trash"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
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