<!-- < ?php require_once("dao/experiencia.php"); ?> -->

<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $experiencia=[
        "experiencia" => "",
        "empresa" => "",
        "cargo" => "",
        "dataInicial" => "",
        "dataFinal" => "",
        "localizacao" => "",
        "funcoes" => "",
    ];
    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into experiencias (
            experiencia, empresa, cargo, dataInicial, dataFinal, localizacao, funcoes, usuario
        ) values (
            '{$_GET["experiencia"]}', '{$_GET["empresa"]}', '{$_GET["cargo"]}', '{$_GET["dataInicial"]}', '{$_GET["dataFinal"]}', '{$_GET["localizacao"]}', '{$_GET["funcoes"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $experiencia=[
                "experiencia" => $_GET["experiencia"],
                "empresa" => $_GET["empresa"],
                "cargo" => $_GET["cargo"],
                "dataInicial" => $_GET["dataInicial"],
                "dataFinal" => $_GET["dataFinal"],
                "localizacao" => $_GET["localizacao"],
                "funcoes" => $_GET["funcoes"],
            ];

        } else{
            $mensagem = "Erro ao salvar";
        }
    } else{
        $result = $mysqli->query("select * from dadosPessoais where usuario=1");
        $row = $result->fetch_assoc();
        $experiencia=[
            "experiencia" => "",
            "empresa" => "",
            "cargo" => "",
            "dataInicial" => "",
            "dataFinal" => "",
            "localizacao" => "",
            "funcoes" => "",
        ];
    
        if ($row != NULL){
            $experiencia = $row;
        }
    }
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/experiencia.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> <!-- empresa, cargo, dataInicial, dataFinal, localizacao, funcoes -->
    <h1>Experiência Profissional</h1>
    <form>
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <div class="grupoColuna bg-info">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="empresa">Empresa</label>
                            <input type="text" class="form-control" id="empresa" value="<?=$experiencia['dataInicio'];?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" id="cargo" placeholder="" value="<?=$experiencia['dataInicio'];?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="localizacao">Localização</label>
                            <select class="form-control" id="localizacao" placeholder="">
                                <option value="SP" <?php if ($experiencia['localizacao'] == "SP"){echo 'selected';}?>>São Paulo</option>
                                <option value="AL" <?php if ($experiencia['localizacao'] == "AL"){echo 'selected';}?>>Alagoas</option>
                                <option value="RJ" <?php if ($experiencia['localizacao'] == "RJ"){echo 'selected';}?>>Rio de Janeiro</option>
                                <option value="CE" <?php if ($experiencia['localizacao'] == "CE"){echo 'selected';}?>>Ceara</option>
                                <option value="PE" <?php if ($experiencia['localizacao'] == "PE"){echo 'selected';}?>>Pernambuco</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col-md-4 col-sm-5 ">
                <div class="grupoColuna bg-secondary">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="dataInicial">Data Inicio</label>
                            <input type="text" class="form-control" id="dataInicial" placeholder="00/00/0000" value="<?=$experiencia['dataInicio'];?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="dataFinal">Data Final</label>
                            <input type="text" class="form-control" id="dataFinal" placeholder="00/00/0000" value="<?=$experiencia['dataFinal'];?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row enviarForm">
            <div class="col-auto">
                <button type="reset" class="btn btn-primary mb-2">Novo</button>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Salvar</button>
            </div>
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
        <th scope="col">Empresa</th>
        <th scope="col">Cargo</th>
        <th scope="col">Localização</th>
        <th scope="col">Data Inicio</th>
        <th scope="col">Data Final</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $experiencia['empresa']; ?></td>
        <td><?php echo $experiencia['cargo']; ?></td>
        <td><?php echo $experiencia['localizacao']; ?></td>
        <td><?php echo $experiencia['dataIncial']; ?></td>
        <td><?php echo $experiencia['dataFinal']; ?></td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>