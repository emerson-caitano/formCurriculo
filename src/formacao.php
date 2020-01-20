<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $formacao=[
        "formacaoAcademica" => "",
        "instituicao" => "",
        "curso" => "",
        "areaAcademica" => "",
        "dataInicial" => "",
        "dataFinal" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into formacoesAcademicas (
            formacaoAcademica, instituicao, curso, usuario
        ) values (
            '{$_GET["formacaoAcademica"]}', '{$_GET["instituicao"]}', '{$_GET["curso"]}', '{$_GET["areaAcademica"]}', '{$_GET["dataInicial"]}', '{$_GET["dataFinal"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $formacao=[
                "formacaoAcademica" => $_GET["formacaoAcademica"],
                "instituicao" => $_GET["instituicao"],
                "curso" => $_GET["curso"],
                "areaAcademica" => $_GET["areaAcademica"],
                "dataInicial" => $_GET["dataInicial"],
                "dataFinal" => $_GET["dataFinal"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $formacao=[
            "formacaoAcademica" => "",
            "instituicao" => "",
            "curso" => "",
            "areaAcademica" => "",
            "dataInicial" => "",
            "dataFinal" => "",
        ];
    
        if ($row != NULL){
            $formacao = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/formacao.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

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
        <div class="form-group col-md-2">
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
        <div class="form-group col-md-2">
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
    <p><?=$mensagem;?></p>


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