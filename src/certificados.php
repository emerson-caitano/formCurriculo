<?php require_once("cabecalho/index.php"); ?>
<link rel="stylesheet" href="css/certificado.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> <!-- Certificado, Descrição e Link -->
    <h1>Certificados</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="certificado">Certificado</label>
            <input type="text" class="form-control" id="certificado" placeholder="Informe a certificação recebida">
        </div>
<!-- Desenvolver acrescentar data do certificado e vencimento do mesmo -->
        <!-- <div class="form-group col-md-3">
            <label for="dataCertificado">Data do Certificado</label>
            <input type="text" class="form-control" id="dataCertificado" placeholder="00/00/0000">
        </div>
        <div class="form-group col-md-3">
            <label for="vencimentoCertificado">Vencimento do Certificado</label>
            <input type="text" class="form-control" id="vencimentoCertificado" placeholder="00/00/0000">
        </div> -->
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao">
        </div>
        <div class="form-group col-md-6">
            <label for="linkCertificado">Link</label>
            <input type="text" class="form-control" id="linkCertificado" placeholder="Link do certificado http://www.curso.com/certificado/123455">
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
<table class="table">
    <thead>
        <tr>
        <th scope="col">Certificados</th>
        <th scope="col">Descrição</th>
        <th scope="col">Link</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Mark</td>
        <td>Otto</td>
        <td>@Link</td>
    </tr>
    <tr>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@Link</td>
    </tr>
    <tr>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@Link</td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>