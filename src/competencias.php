<?php require_once("cabecalho/index.php"); ?>

<div class="container"> <!-- Certificado, Descrição e Link -->
    <h1>Certificados</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="competencia">Competência</label>
            <input type="text" class="form-control" id="competencia">
        </div>
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" placeholder="">
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <button type="reset" class="btn btn-primary mb-2">Novo</button>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Salvar</button>
        </div>
    </div>
    </form>

</br>
</br>
</br>
<table class="table">
    <thead>
        <tr>
        <th scope="col">Certificados</th>
        <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Mark</td>
        <td>Otto</td>
    </tr>
    <tr>
        <td>Jacob</td>
        <td>Thornton</td>
    </tr>
    <tr>
        <td>Larry</td>
        <td>the Bird</td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>