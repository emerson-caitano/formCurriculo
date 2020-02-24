<!-- < ?php require_once("dao/idiomas.php"); ?> -->

<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $idiomas=[
        "idioma" => "",
        "nivel" => "",
        "descricao" => "",
    ];


    //Selecionar no banco
    if ($_GET != NULL){
        $sql = "SELECT * FROM competencias WHERE competencia ='{$_GET["competencia"]}'";
        $result = $mysqli->query($sql);
        $competencia = $result->fetch_assoc();
        if ($competencia == NULL) {
            $mensagem = "Competencia não localizada; ".$_GET["competencia"];
        }
    }
    
    // Excluir do Banco
    if ($_POST != NULL){
        if ($_POST != NULL && $_POST["excluir"] != NULL){
            $sql = "DELETE FROM competencias WHERE competencia='{$_POST["competencia"]}'";
            if ($mysqli->query($sql) === TRUE) {
                $mensagem = "Alterado com sucesso";
                $competencia=$_POST;
                header('Location: /competencias.php'); // voltar para mesma pagina
            } else{
                $mensagem = "Erro ao Excluir";
            }
        }

    //alterando 
    if ($_POST["competencia"] != NULL){
        $sql = "UPDATE competencias SET descricao='{$_POST["descricao"]}' WHERE competencia='{$_POST["competencia"]}'"; 
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Alterado com sucesso";
            $competencia=$_POST;
        } else{
            $mensagem = "Erro ao alterar";
        }

    //salvar no banco
    if ($_GET != NULL){
        $sql = "insert into idiomas (
            nivel, 
            descricao, 
            usuario
        ) values (
            '{$_GET["nivel"]}', 
            '{$_GET["descricao"]}', 
            1
        )";
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $idiomas=[
                "idioma" => $mysqli->insert_id,
                "nivel" => $_GET["nivel"],
                "descricao" => $_GET["descricao"],
            ];

            header('Location: /idiomas.php'); // voltar para mesma pagina
            exit;
            
        } else{
            $mensagem = "Erro ao salvar";
        }
    }

    $result = $mysqli->query("select * from idiomas where usuario=1");
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
            <div class="form-group col-md-3">
                <label for="nivel">Nível</label>
                    <select class="form-control" id="nivel" name="nivel">
                    <option>Básico</option>
                    <option>Intermediário</option>
                    <option>Fluente</option>
                </select>
            </div>
            <div class="form-group col-md-9">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Acrescente alguma descrição ao seu conhecimento do idioma">
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
            <th scope="col">Nível</th>
            <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php  while ($idiomas = $result->fetch_assoc()) { ?>
            <tr>
                <td><?=$idiomas["nivel"];?></td>
                <td><?=$idiomas["descricao"];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>