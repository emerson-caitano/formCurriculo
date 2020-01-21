<!-- <?php require_once("dao/idiomas.php"); ?> -->

<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $idioma=[
        "idioma" => "",
        "nivelIdioma" => "",
        "descricao" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into idiomas (
            idioma, nivelIdioma, descricao, usuario
        ) values (
            '{$_GET["idioma"]}', '{$_GET["nivelIdioma"]}', '{$_GET["descricao"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $idioma=[
                "idioma" => $_GET["idioma"],
                "nivelIdioma" => $_GET["nivelIdioma"],
                "descricao" => $_GET["descricao"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from idiomas where usuario=1");
        $row = $result->fetch_assoc();
        $idioma=[
            "idioma" => "",
            "nivelIdioma" => "",
            "descricao" => "",
        ];
    
        if ($row != NULL){
            $idioma = $row;
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
            <label for="nivelIdioma">Nível</label>
            <select class="form-control" id="nivelIdioma">
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