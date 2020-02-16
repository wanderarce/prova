<?php
include "../cabecalho.php";
include "../../legado/conecta.php"; 

$id = $_GET["id"] ?? "";
$acao = "inserir";
$resultado= array("id", "recarga", "telefone", "cliente_id");
try {
    $query = "SELECT * FROM cliente ";
    $consultaClientes = $pdo->prepare($query);
    $consultaClientes->execute();
    $clientes = $consultaClientes->fetchAll(PDO::FETCH_ASSOC);

    if ($id != "") {
        $consulta  = $pdo->prepare("SELECT * FROM venda WHERE id = :id");
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->execute();

        $qr = $consulta->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($qr) > 0) {
            $resultado = $qr[0]; 
        } else {
            $resultado["id"]='';
            $resultado["recarga"]='';
            $resultado["telefone"]='';
            $resultado["cliente_id"]='';            
        }
        $acao = "editar";
    }
} catch (PDOException $e) {
    var_dump($e);
    $mensagem = 'Error: '.$e->getMessage();
}

?>


    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Cadastro de venda</h1>
                <form action="../../legado/crudVenda.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="acao" value="<?php echo $acao; ?>">
                    <input type="hidden" name="id" value="<?php echo $resultado['id']  ?>">
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" id="cliente" name="cliente_id" required>
                            <option value="">Escolha</option>
                            <?php 
                                foreach($clientes as $cliente):    
                            ?>  
                                <option value="<?php echo $cliente['id']; ?>"  <?php echo $cliente["id"] == ($resultado['cliente_id'] ?? "") ? 'selected': ''; ?> >
                                    <?php echo  $cliente['nome']; ?>
                                </option>
                            <?php 
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero" >Numero</label>
                        <input type="text" class="form-control" id="numero" name="telefone" value="<?php echo $resultado['telefone'] ?? "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="recarga" >Recarga</label>
                        <select class="form-control" id="recarga" name="recarga" required>
                            <option value="" <?php echo $resultado["recarga"] ?? "" == '' ? 'selected': ''; ?> >Escolha</option>
                            <option value="10" <?php echo $resultado["recarga"] ?? "" == '10.00' ? 'selected': ''; ?>>R$ 10,00</option>
                            <option value="20" <?php echo $resultado["recarga"] ?? "" == '20.00' ? 'selected': ''; ?>>R$ 20,00</option>
                            <option value="30" <?php echo $resultado["recarga"] ?? "" == '30.00' ? 'selected': ''; ?>>R$ 30,00</option>
                            <option value="40" <?php echo $resultado["recarga"] ?? "" == '40.00' ? 'selected': ''; ?>>R$ 40,00</option>
                            <option value="50" <?php echo $resultado["recarga"] ?? "" == '50.00' ? 'selected': ''; ?>>R$ 50,00</option>
                                
                            
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>

<?php
include "../rodape.php";