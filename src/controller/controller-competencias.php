<!-- < ?php require_once("dao/competencia.php"); ?> -->
<?php 
    var_dump($_POST);
    require_once("dao/db.php");
    $mensagem = "";
    $competencia=[
        "competencia" => "",
        "descricao" => "",
    ];
    
    if ($_GET != NULL){
        // Excluir do Banco
        if ($_GET["action"] == "excluir"){
            $sql = "DELETE FROM competencias WHERE competencia='{$_GET["competencia"]}'";
            if ($mysqli->query($sql) === TRUE) {
                $mensagem = "Excluido com sucesso";
                $competencia=$_GET;
            } else{
                $mensagem = "Erro ao Excluir";
            }
        }
        //Selecionar por ID banco
        $sql = "SELECT * FROM competencias WHERE competencia ='{$_GET["competencia"]}'";
        $result = $mysqli->query($sql);
        $competencia = $result->fetch_assoc();
        if ($competencia == NULL) {
            $mensagem = "Competencia não localizada; ".$_GET["competencia"];
        }
    }

    // var_dump($_POST);

if ($_POST != NULL){
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
    } else {
        echo ("iserindo");
        $sql = "insert into competencias (
            descricao,
            usuario
        ) values (
            '{$_POST["descricao"]}',
            1
        )";
        // echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $competencia=[
                "competencia" => $mysqli->insert_id,
                "descricao" => $_POST["descricao"],
                "link" => $_POST["link"],
            ];            
        } else{
            $mensagem = "Erro ao salvar";
        }
    }
}

$result = $mysqli->query("select * from competencias where usuario=1");
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/competencia.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> 
    <h1>Competencias</h1>
    <form action="/competencias.php" method="POST">
    <input type="hidden" name="competencia" value="<?=$competencia['competencia'];?>">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" required="required" name="descricao" placeholder="" value="<?=$competencia['descricao'];?>">
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
            <button type="reset" class="btn btn-primary mb-2">Novo</button>
            </div>
            <div class="col-auto">
                <button type="submit" value="submit" class="btn btn-primary mb-2">Salvar</button>
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
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Link</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($competencia = $result->fetch_assoc()) { ?>
                <tr>
                    <td><a href="/competencias.php?competencia=<?=$competencia["competencia"];?>"><?=$competencia["competencia"];?></a></td>
                    <td><?=$competencia['descricao']; ?></td>
                    <td><a href="/competencias.php?competencia=<?=$competencia["competencia"];?>&action=excluir"><?=$competencia["competencia"];?>Excluir</a></td>
                </tr>
                <?=$competencia["competencia"];?>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once("footer/footer.php"); ?>