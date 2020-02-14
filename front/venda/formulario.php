<?php
include "../cabecalho.php"; ?>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Cadastro de venda</h1>
                <form>
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" id="cliente">
                            <option value="">Escolha</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero">Numero</label>
                        <input type="text" class="form-control" id="numero">
                    </div>
                    <div class="form-group">
                        <label for="recarga">Recarga</label>
                        <select class="form-control" id="recarga">
                            <option value="">Escolha</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>

<?php
include "../rodape.php";