<?php require_once("cabecalho/index.php"); ?>

<div class="container"> <!-- empresa, cargo, dataInicial, dataFinal, localizacao, funcoes -->
    <h1>Experiência Profissional</h1>
    <form>
    <div class="row">
        <div class="form-group col-md-9">
            <label for="empresa">Empresa</label>
            <input type="text" class="form-control" id="empresa">
        </div>
        <div class="form-group col-md-2">
            <label for="dataInicial">Data Inicio</label>
            <input type="text" class="form-control" id="dataInicial" placeholder="00/00/0000">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-5">
            <label for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="localizacao">Localização</label>
            <select class="form-control" id="localizacao" placeholder="">
                <option>São Paulo</option>
                <option>Maceio</option>
                <option>Rio de Janeiro</option>
                <option>Fortaleza</option>
                <option>Recife</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="dataFinal">Data Final</label>
            <input type="text" class="form-control" id="dataFinal" placeholder="00/00/0000">
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
        <th scope="col">Empresa</th>
        <th scope="col">Cargo</th>
        <th scope="col">Localização</th>
        <th scope="col">Data Inicio</th>
        <th scope="col">Data Final</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>Microsoft Corporate</td>
        <td>Owner</td>
        <td>Mark</td>
        <td>00/00/0000</td>
        <td>00/00/0000</td>
    </tr>
    <tr>
        <td>Dougkariok System </td>
        <td>Mark</td>
        <td>Rio de Janeiro</td>
        <td>00/00/0000</td>
        <td>00/00/0000</td>
    </tr>
    <tr>
        <td>Larry</td>
        <td>Mark</td>
        <td>Rio Grande do Sul</td>
        <td>00/00/0000</td>
        <td>00/00/0000</td>
    </tr>
  </tbody>
</table>

</div>

<?php require_once("footer/footer.php"); ?>