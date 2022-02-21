
<?php echo view('template/header'); ?>

<span hidden id="msg_sweet"><?php foreach(session()->getFlashdata() as $msghidden){ echo $msghidden; } ?></span> 

<?php if(session()->getFlashdata('msg')):?>
  <div style=" margin-bottom: -60px;" id="div_errors_reg" class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif;?>

<div class="d-flex justify-content-center">
  <div class="card" style="width: 30rem; margin-top:60px;">
    <div class="card-body">
      <h1 class="card-title text-center">T-max Library</h1>
      <h4 class=" text-center">Cadastro</h4>
      
      <form action="register/register" method="post">

        <div class="row">

          <div class="col mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome:</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="col mb-3">
            <label for="exampleInputClass" class="form-label">Classificação</label>
            <select name="level" class="form-select" aria-label="Default select example">
              <option selected>...</option>
              <option value="1">Aluno</option>
              <option value="2">Professor</option>
            </select>
          </div>

        </div>

        <div class="row">

          <div class="col mb-3">
            <label for="exampleInputemail" class="form-label">E-mail</label>
            <input placeholder="Insira seu melhor e-mail" name="email" type="email" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="col mb-3">
            <label for="exampleInputPass" class="form-label">Senha</label>
            <input placeholder="Crie uma senha" name="password" type="password" class="form-control" id="exampleInputPassword1">
          </div>

        </div>

        <div class="row">
          <div class="col mb-3">
            <label  class="form-label">Colégio</label>
            <input placeholder="Em qual colégio você está matriculado" name="school" type="text" class="form-control" id="exampleInputPassword1">
          </div>
        </div>

        <hr>
        <div class="d-grid gap-2">
          <input class="btn btn-success" type="submit" value="Cadastrar">
          <hr>
          <a href="<?php echo base_url('login') ?>"  class="btn btn-primary" type="button">Voltar para a tela de login</a>
        </div>

      </form> 
      
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" >
        
      var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Cadastro efetuado com sucesso.') 
        {
            swal({
                icon: "success",
                text: "Cadastrado com sucesso!"
              });  
        }

        var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'E-mail já existente.') 
        {
            swal({
                icon: "warning",
                text: "E-mail já existe no banco de dados"
              });  
        }

    </script>

<?php echo view('template/footer'); ?>