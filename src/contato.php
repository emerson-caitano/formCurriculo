<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $contato=[
        "contato" => "",
        "url" => "",
        "descricao" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into dadosPessoais (
            contato, url, descricao, usuario
        ) values (
            '{$_GET["contato"]}', '{$_GET["url"]}', '{$_GET["descricao"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $contato=[
                "contato" => $_GET["contato"],
                "url" => $_GET["url"],
                "descricao" => $_GET["descricao"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $contato=[
            "contato" => "",
            "url" => "",
            "descricao" => "",
        ];
    
        if ($row != NULL){
            $contato = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/contato.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container">
    <h1>Contato</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="seu@email.com">
        </div>
        <div class="form-group col-md-2">
            <label for="celular">Celular</label>
            <input type="text" class="form-control" id="celular" placeholder="(00)00000-0000">
        </div>
        <div class="form-group col-md-2">
        <label for="zap">jj </label>
        <div class="form-control">
        <input type="checkbox" value="" id="defaultCheck1">Sim
        </div>
        </div>
        <div class="form-group col-md-2">
            <label for="celular">Fixo</label>
            <input type="text" class="form-control" id="celular" placeholder="(00)0000-0000">
        </div>
    </div>
    <div class="row">
    <div class="form-group col-md-3">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" id="facebook" placeholder="@nickname">
        </div>
        <div class="form-group col-md-3">
            <label for="linkedin">LinkedIn</label>
            <input type="text" class="form-control" id="linkedin" placeholder="@nickname">
        </div>
        <div class="form-group col-md-3">
            <label for="github">GitHub</label>
            <input type="text" class="form-control" id="github" placeholder="@nickname">
        </div>
        <div class="form-group col-md-3">
            <label for="github">Telegram</label>
            <input type="text" class="form-control" id="github" placeholder="@nickname">
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
        <th scope="col">E-mail</th>
        <th scope="col">Celular</th>
        <th scope="col">Fixo</th>
        <th scope="col">Facebook</th>
        <th scope="col">LinkedIn</th>
        <th scope="col">GitHub</th>
        <th scope="col">Telegram</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Mark</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
    </tr>
    <tr>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Jacob</td>
        <td>Thornton</td>
    </tr>
    <tr>
        <td>Larry</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>the Bird</td>
        <td>Otto</td>
        <td>Otto</td>
        <td>Otto</td>
    </tr>
    </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>