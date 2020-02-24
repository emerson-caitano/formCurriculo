<!-- < ?php require_once("dao/dadosPessoais.php"); ?> -->

<?php 
    require_once("dao/db.php");
    $mensagem = "";
    $dadoPessoal=[ //ao inves de adicionar uma nova coluna ma tabela, como associar o usuario a esse cara?
        "dadoPessoal" => "",
        "nome" => "",
        "titulo" => "",
        "estado" => "",
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
        $sql = "insert into dadosPessoais (
            nome, 
            titulo, 
            estado, 
            usuario
        ) values (
            '{$_GET["nome"]}', 
            '{$_GET["titulo"]}', 
            '{$_GET["estado"]}', 
            1
        )";
        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Salvo com sucesso";
            $dadoPessoal=[
                "dadoPessoal" => $mysqli->insert_id,
                "nome" => $_GET["nome"],
                "titulo" => $_GET["titulo"],
                "estado" => $_GET["estado"],
            ];

        } else{
            echo($mysqli->error);
            $mensagem = $mysqli->error;
        }
        // header('Location: /dadospessoais.php'); // voltar para mesma pagina
        
        
    }

$result = $mysqli->query("select * from dadosPessoais where usuario=1");
?>

<?php require_once("cabecalho/index.php"); ?>

<link rel="stylesheet" href="css/dadospessoais.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>    

<div class="container">
    <h1>Dados Pessoais</h1>
    <form action="/dadospessoais.php" method="POST">
    <input type="hidden" name="dadoPesssoal" value="<?=$dadoPessoal['dadoPessoal'];?>">
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
            <button type="reset" class="btn btn-primary mb-2">Novo</button>
        </div>
        <div class="col-auto">
            <button type="submit" value="salvar" class="btn btn-primary mb-2">Salvar</button>
        </div>
    </div>
    </form>

    <p><?=$mensagem;?></p>

    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Resumo</th>
                <th scope="col">Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php  while ($dadoPessoal = $result->fetch_assoc()) { ?>
                <tr>
                    <td><a href="/dadospessoais.php?dadoPessoal=<?=$dadoPessoal["dadoPessoal"];?>"><?=$dadoPessoal["dadoPessoal"];?></a></td>
                    <td><?=$dadoPessoal["nome"];?></td>
                    <td><?=$dadoPessoal["titulo"];?></td>
                    <td><?=$dadoPessoal["estado"];?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>


<?php require_once("footer/footer.php"); ?>