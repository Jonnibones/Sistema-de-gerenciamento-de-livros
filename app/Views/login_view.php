

<?php echo view('template/header'); ?>
  <?php if(session()->getFlashdata('msg')):?>
          <div id="div_errors" class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
  <?php endif;?>

  <div class="d-flex justify-content-center">
    <div class="card" style="width: 30rem; margin-top:30px;">
      <div class="card-body">
        <h1 class="card-title text-center">T-max Library</h1>
        <h4 class=" text-center">Login</h4>
        
        <form action="login/auth" method="post">

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">E-mail:</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Jesus te ama.</div>
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input name="password"  type="password" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="d-grid gap-2">
            <input class="btn btn-success" type="submit" value="Entre">
            <hr>
            <a href="<?php echo base_url('register') ?>"  class="btn btn-primary" type="button">Cadastre-se</a>
          </div>

        </form> 
        

      </div>
    </div>
  </div>

<?php echo view('template/footer'); ?>

