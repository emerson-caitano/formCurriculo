<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $certificado=[
        "certificado" => "",
        "descricao" => "",
        "link" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into idiomas (
            certificado, descricao, link, usuario
        ) values (
            '{$_GET["certificado"]}', '{$_GET["descricao"]}', '{$_GET["link"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $certificado=[
                "certificado" => $_GET["certificado"],
                "descricao" => $_GET["descricao"],
                "link" => $_GET["link"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $certificado=[
            "certificado" => "",
            "descricao" => "",
            "link" => "",
        ];
    
        if ($row != NULL){
            $certificado = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/idiomas.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container">
    <h1>Idiomas</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="idioma">Idioma</label>
            <input type="text" class="form-control" id="idioma" placeholder="Informe o idioma">
        </div>
        <div class="form-group col-md-3">
            <label for="exampleFormControlSelect1">Nível</label>
            <select class="form-control" id="exampleFormControlSelect1">
            <option>Básico</option>
            <option>Intermediário</option>
            <option>Fluente</option>
        </select>
    </div>
    </div>
    <div class="row">
        <div class="form-group col-md-9">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" placeholder="Acrescente alguma descrição ao seu conhecimento do idioma">
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
        <th scope="col">Idioma</th>
        <th scope="col">Nível</th>
        <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Ingles</td>
        <td>Basico</td>
        <td>Otto</td>
    </tr>
    <tr>
        <td>Espanhol</td>
        <td>Fluente</td>
        <td>Thornton</td>
    </tr>
    <tr>
        <td>Mandarim</td>
        <td>Larry</td>
        <td>the Bird</td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>