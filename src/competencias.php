<!-- <?php require_once("dao/competencia.php"); ?> -->

<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $competencia=[
        "competencia" => "",
        "descricao" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into competencias (
            competencia, descricao, usuario
        ) values (
            '{$_GET["competencia"]}', '{$_GET["descricao"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $competencia=[
                "competencia" => $_GET["competencia"],
                "descricao" => $_GET["descricao"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from competencias where usuario=1");
        $row = $result->fetch_assoc();
        $certificado=[
            "competencia" => "",
            "descricao" => "",
        ];
    
        if ($row != NULL){
            $competencia = $row;
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
            <label for="certificado">Competencias</label>
            <input type="text" class="form-control" id="certificado" value="<?=$competencia['competencia'];?>">
        </div>
        <div class="form-group col-md-6">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" placeholder="" value="<?=$competencia['descricao'];?>">
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
        <th scope="col">Competencia</th>
        <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $competencia['competencia']; ?></td>
        <td><?php echo $competencia['descricao']; ?></td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>