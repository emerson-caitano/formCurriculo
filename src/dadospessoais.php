<?php require_once("cabecalho/index.php"); ?>
<?php require_once("cabecalho/menu.php"); ?>

<div class="container">
    <h1>Dados Pessoais</h1>
    <form>
    <div class="form-group">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" id="nome">
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="titulo">Breve resumo / Atual Função</label>
            <input type="text" class="form-control" id="titulo">
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Informe seu estado</label>
            <select class="form-control" id="estado">
                <option>São Paulo</option>
                <option>Maceio</option>
                <option>Rio de Janeiro</option>
                <option>Fortaleza</option>
                <option>Recife</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>
        </div>
    </div>
    </form>
</div>

<?php require_once("footer/footer.php"); ?>