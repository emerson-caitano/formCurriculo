<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $certificados=[
        "certificado" => "",
        "descricao" => "",
        "link" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into certificados (
            certificado, descricao, link, usuario
        ) values (
            '{$_GET["certificado"]}', '{$_GET["descricao"]}', '{$_GET["link"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $certificados=[
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
        $certificados=[
            "certificado" => "",
            "descricao" => "",
            "link" => "",
        ];
    
        if ($row != NULL){
            $certificados = $row;
        }
    }
?>

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
            <input type="text" class="form-control" id="certificado" placeholder="Informe a certificação recebida" value="<?=$certificados['certificado'];?>">
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
            <input type="text" class="form-control" id="descricao" value="<?=$certificados['descricao'];?>">
        </div>
        <div class="form-group col-md-6">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" placeholder="Link do certificado http://www.curso.com/certificado/123455" value="<?=$certificados['link'];?>">
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
        <td><?php echo $certificado['certificado']; ?></td>
        <td><?php echo $certificado['descricao']; ?></td>
        <td><?php echo $certificado['link']; ?></td>
    </tr>
</tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>