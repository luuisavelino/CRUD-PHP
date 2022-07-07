<?php

if (time() - $_SESSION['time'] > 10) { // sessão iniciada há mais de 10 segundos
  unset($_SESSION['time']);
  unset($_SESSION['status']);
  unset($_SESSION['typeError']);
  unset($_SESSION['typeSuccess']);
}

$mensagem = '';
if(isset($_SESSION['time'])){
  switch ($_SESSION['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso! '.$_SESSION['typeSuccess'].'.</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">'.$_SESSION['typeError'].'. Ação não executada!</div>';
      break;
  }
}

?>



<main>
  <?=$mensagem?>
  <section class="mb-4">
    <a href="../../index.php"><button class="btn btn-success">Home</button></a>
    <a href="cadastrar-produtos.php"><button class="btn btn-success">Novo produto</button></a>
  </section>

  <section>
    <form action="produtos.php" method="post">
      <table id="tabela" class="table bg-light mt-4 rounded-lg">
        <thead>
          <tr>
            <th data-sortable="false">
              <div>
                <input class="check" type="checkbox" value="" id="checkIndex">
                <label class="check"></label>
              </div>
            </th>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Descrição</th>
            <th data-sortable="false">Ações</th>
          </tr> 
        </thead>
        <tbody>
          <?php foreach($produtos as $produto): ?>
          <tr>
            <td>
                <input class="check" type="checkbox" id="check" name="excluir[<?=$produto['id']?>]">
                <label class="check"></label>
            </td>
            <td><?=$produto['codigo']?></td>
            <td><?=$produto['nome']?></td>
            <td><?=$produto['preco']?></td>
            <td><?=$produto['quantidade']?></td>
            <td><?=$produto['descricao']?></td>
            <td> 

  
              <?php include __DIR__.'/botoesAcao.php'; ?>
              <?php include __DIR__.'/popUp.php'; ?>
              

            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <input type="submit" name="excluirProduto" value="Excluir" class="btn btn-danger" />
    </form>
  </section> 
</main>



<script src="../js/produtos.js"></script>
