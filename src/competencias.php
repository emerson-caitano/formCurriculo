<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $certificado=[
        "certificados" => "",
        "descricao" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into competencias (
            certificados, descricao, usuario
        ) values (
            '{$_GET["certificados"]}', '{$_GET["descricao"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $certificado=[
                "certificados" => $_GET["certificados"],
                "descricao" => $_GET["descricao"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $certificado=[
            "certificados" => "",
            "descricao" => "",
        ];
    
        if ($row != NULL){
            $certificado = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/competencia.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> <!-- Certificado, Descrição e Link -->
    <h1>Competencias</h1>
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