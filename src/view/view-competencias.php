<!-- < ?php require_once("controller/competencia.php"); ?> -->
<?php 

require_once("model/model-competencias.php"); 
$objCompetencia = new Competencia();


$listaDeCompetencias = $objCompetencia->listar('1');
$mensagem = "";


require_once("cabecalho/index.php"); 
?>

<link rel="stylesheet" href="css/competencia.css"></link>
</head>
    <body>
        <?php require_once("cabecalho/menu.php"); ?>

<div class="container"> 
    <h1>Competencias</h1>
    <form action="/competencias.php" method="POST">
    <input type="hidden" name="competencia" value="<?=$objCompetencia->competencia;?>">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" required="required" name="descricao" placeholder="" value="<?=$objCompetencia->descricao;?>">
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
            <?php foreach ($listaDeCompetencias as $competencia) { 
                ?>
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