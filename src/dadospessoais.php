<!-- <?php require_once("dao/dadosPessoais.php"); ?> -->

<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $dadoPessoal=[
        "nome" => "",
        "titulo" => "",
        "estado" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into dadosPessoais (
            nome, titulo, estado, usuario
        ) values (
            '{$_GET["nome"]}', '{$_GET["titulo"]}', '{$_GET["estado"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $dadoPessoal=[
                "nome" => $_GET["nome"],
                "titulo" => $_GET["titulo"],
                "estado" => $_GET["estado"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $dadoPessoal=[
            "nome" => "",
            "titulo" => "",
            "estado" => "",
        ];
    
        if ($row != NULL){
            $dadoPessoal = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/dadospessoais.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>    

<div class="container">
    <h1>Dados Pessoais</h1>
    <form action="/dadosPessoais.php" method="get">
    <div class="form-group">
        <label for="nome">Nome Completo</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?=$dadoPessoal['nome'];?>">
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="titulo">Breve resumo / Atual Função</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="<?=$dadoPessoal['titulo'];?>">
        </div>
        <div class="form-group col-md-6">
            <label for="estado">Informe seu estado</label>
            <select class="form-control" name="estado" id="estado" >
                <option value="SP" <?php if ($dadoPessoal['estado'] == "SP"){echo 'selected';}?>>São Paulo</option>
                <option value="AL" <?php if ($dadoPessoal['estado'] == "AL"){echo 'selected';}?>>Alagoas</option>
                <option value="RJ" <?php if ($dadoPessoal['estado'] == "RJ"){echo 'selected';}?>>Rio de Janeiro</option>
                <option value="CE" <?php if ($dadoPessoal['estado'] == "CE"){echo 'selected';}?>>Ceara</option>
                <option value="PE" <?php if ($dadoPessoal['estado'] == "PE"){echo 'selected';}?>>Pernanbuco</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-2">Salvar</button>
        </div>
    </div>
    </form>
    <p><?=$mensagem;?></p>

</div>

<?php require_once("footer/footer.php"); ?>