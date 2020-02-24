
<!-- < ?php require_once("dao/contato.php"); ?> -->
<?php 
    // var_dump($_GET);
    require_once("dao/db.php");
    $mensagem = "";
    $contato=[
        "email" => "",
        "celular" => "",
        "whatsapp" => "",
        "fixo" => "",
        "facebook" => "",
        "linkedin" => "",
        "github" => "",
        "telegram" => "",
    ];

    //Selecionar no banco
    if ($_GET != NULL){
        $sql = "SELECT * FROM contatos WHERE contato ='{$_GET["contato"]}'";
        $result = $mysqli->query($sql);
        $contato = $result->fetch_assoc();
        if ($contato == NULL) {
            $mensagem = "contato não localizado; ".$_GET["contato"];
        }
    }
    
    // Excluir do Banco
    if ($_POST != NULL){
        if ($_POST != NULL && $_POST["excluir"] != NULL){
            $sql = "DELETE FROM contatos WHERE contato='{$_POST["contato"]}'";
            if ($mysqli->query($sql) === TRUE) {
                $mensagem = "Alterado com sucesso";
                $contato=$_POST;
                header('Location: /contato.php'); // voltar para mesma pagina
            } else{
                $mensagem = "Erro ao Excluir";
            }
        }

    //alterando 
    if ($_POST["contato"] != NULL){
        $sql = "UPDATE contatos SET descricao='{$_POST["descricao"]}' WHERE contato='{$_POST["contato"]}'"; 
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Alterado com sucesso";
            $contato=$_POST;
        } else{
            $mensagem = "Erro ao alterar";
        }

    if ($_GET != NULL){
        //salvar no banco
        $sql = "insert into contatos (
            email, celular, whatsapp, fixo, facebook, linkedin, telegram, usuario
        ) values (
            '{$_GET["email"]}', '{$_GET["celular"]}', '{$_GET["whatsapp"]}', '{$_GET["fixo"]}', '{$_GET["facebook"]}', '{$_GET["github"]}', '{$_GET["telegram"]}', 1
        )";
        echo ($sql);
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $contato=[
                "email" => $_GET["email"],
                "celular" => $_GET["celular"],
                "whatsapp" => $_GET["whatsapp"],
                "fixo" => $_GET["fixo"],
                "facebook" => $_GET["facebook"],
                "linkedin" => $_GET["linkedin"],
                "github" => $_GET["github"],
                "telegram" => $_GET["telegram"],
            ];

            header('Location: /contato.php'); // voltar para mesma pagina
            exit;
            
        } else{
            $mensagem = "Erro ao salvar";
        }
    }

    $result = $mysqli->query("select * from contato where usuario=1");
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/contato.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container">
    <h1>Contato</h1>
    <form action="/contato.php" method="POST">
    <input type="hidden" name="contato" value="<?=$contato['contato'];?>">
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
        <input type="checkbox" value="" id="whatsapp">Sim
        </div>
        </div>
        <div class="form-group col-md-2">
            <label for="celular">Fixo</label>
            <input type="text" class="form-control" id="fixo" placeholder="(00)0000-0000">
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
            <input type="text" class="form-control" id="telegram" placeholder="@nickname">
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
        <th scope="col">ID</th>
        <th scope="col">E-mail</th>
        <th scope="col">Celular</th>
        <th scope="col">Whatsapp</th>
        <th scope="col">Fixo</th>
        <th scope="col">Facebook</th>
        <th scope="col">LinkedIn</th>
        <th scope="col">GitHub</th>
        <th scope="col">Telegram</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($contato = $result->fetch_assoc()) { ?>
    <tr>
        <td><a href="/contato.php?contato=<?=$contato["contato"];?>"><?=$contato["contato"];?></a></td>
        <td><?=$contato['email']; ?></td>
        <td><?=$contato['celular']; ?></td>
        <td><?=$contato['whatsapp']; ?></td>
        <td><?=$contato['fixo']; ?></td>
        <td><?=$contato['facebook']; ?></td>
        <td><?=$contato['linkedin']; ?></td>
        <td><?=$contato['github']; ?></td>
        <td><?=$contato['telegram']; ?></td>
        <td>
            <button type="submit" value="submit" class="btn btn-primary sm-1" form="form-excluir">Excluir</button>
        </td>
        </tr>
        <form action="/contato.php" method="POST" id="form-excluir">
            <input type="hidden" name="contato" value="<?=$competencia["competencia"];?>" />
            <input type="hidden" name="excluir" value="1" />
        </form>
    <?php } ?>
    </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>