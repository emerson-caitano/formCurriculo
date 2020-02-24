<!-- < ?php require_once("/certificado.php"); ?> -->
<?php 
    require_once("dao/db.php");
    $mensagem = "";
    $certificado=[
        "certificado" => "",
        "descricao" => "",
        "link" => "",
    ];

    //Selecionar no banco
    if ($_GET != NULL){
        $sql = "SELECT * FROM certificados WHERE certificado ='{$_GET["certificado"]}'";
        $result = $mysqli->query($sql);
        $certificado = $result->fetch_assoc();
        if ($certificado == NULL) {
            $mensagem = "Certificado não localizado; ".$_GET["certificado"];
        }
    }
    
    // Excluir do Banco
    if ($_POST != NULL){
        if ($_POST != NULL && $_POST["excluir"] != NULL){
            $sql = "DELETE FROM certificados WHERE certificado='{$_POST["certificado"]}'";
            if ($mysqli->query($sql) === TRUE) {
                $mensagem = "Alterado com sucesso";
                $certificado=$_POST;
                header('Location: /certificados.php'); // voltar para mesma pagina
            } else{
                $mensagem = "Erro ao Excluir";
            }
        }

    //alterando 
    if ($_POST["certificado"] != NULL){
        $sql = "UPDATE certificados SET descricao='{$_POST["descricao"]}', 
        link='{$_POST["link"]}' WHERE certificado='{$_POST["certificado"]}'"; 
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Alterado com sucesso";
            $certificado=$_POST;
        } else{
            $mensagem = "Erro ao alterar";
        }

    //salvar no banco
    } else {
        $sql = "insert into certificados (
            descricao,
            link,
            usuario
        ) values (
            '{$_POST["descricao"]}',
            '{$_POST["link"]}',
            1
        )";
        // echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $certificado=[
                "certificado" => $mysqli->insert_id,
                "descricao" => $_POST["descricao"],
                "link" => $_POST["link"],
            ];

            header('Location: /certificados.php'); // voltar para mesma pagina
        } else{
            $mensagem = "Erro ao salvar";
        }
    }
}
$result = $mysqli->query("select * from certificados where usuario=1");
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/certificado.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> <!-- Certificado, Descrição e Link -->
    <h1>Certificados</h1>

    <form action="/certificados.php" method="POST">
    <input type="hidden" name="certificado" value="<?=$certificado['certificado'];?>">
        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required="required" value="<?=$certificado['descricao'];?>">
            </div>
            <div class="form-group col-md-6">
                <label for="link">Link</label>
                <input type="text" class="form-control" name="link" id="link" required="required" placeholder='Link do certificado http://...' value="<?=$certificado["link"];?>">
            </div>
        </div>
        <div class="certificados">
            <div class="col-auto">
                <a class="btn btn-primary" href="/certificados.php" role="button">Novo</a>
            </div>
            <div class="col-auto">
                <button type="submit" value="submit" class="btn btn-primary mb-2">Salvar</button>
            </div>
        </div>
    </form>

    <p><?=$mensagem;?></p>

    <br>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Link</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($certificado = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><a href="/certificados.php?certificado=<?=$certificado["certificado"];?>"><?=$certificado["certificado"];?></a></td>
                        <td><?=$certificado["descricao"];?></td>
                        <td><?=$certificado["link"];?></td>
                        <td>
                            <button type="submit" value="submit" class="btn btn-primary sm-1" form="form-excluir">Excluir</button>
                        </td>
                    </tr>
                    <form action="/certificados.php" method="POST" id="form-excluir">
                        <input type="hidden" name="certificado" value="<?=$certificado["certificado"];?>" />
                        <input type="hidden" name="excluir" value="1" />
                    </form>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once("footer/footer.php"); ?>