<?php require_once("cabecalho/index.php"); ?>

<div class="container"> <!-- formacaoAcademica, instituicao, curso, areaAcademica, dataInicial, dataFinal -->
    <h1>Formação</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="instituicao">Instituição</label>
            <input type="text" class="form-control" id="instituicao">
        </div>
        <div class="form-group col-md-3">
            <label for="formacaoAcademica">Formação Academica</label>
            <select class="form-control" id="formacaoAcademica">
                <option>Ensino Fundamental</option>
                <option>Ensino Médio</option>
                <option>Ensino Técnico</option>
                <option>Tecnologo</option>
                <option>Graduação</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="dataInicial">Data Inicio</label>
            <input type="text" class="form-control" id="dataInicial" placeholder="">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="curso">Curso</label>
            <input type="text" class="form-control" id="curso" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="areaAcademica">Area Academica</label>
            <input type="text" class="form-control" id="areaAcademica" placeholder="">
        </div>
        <!-- DATA FINAL SÓ APARECER QUANDO ESTIVER EM ANDAMENTO, CASO CONCLUIDO NÃO APARECER -->
        <div class="form-group col-md-3">
            <label for="dataFinal">Data Final</label>
            <input type="text" class="form-control" id="dataFinal" placeholder="">
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