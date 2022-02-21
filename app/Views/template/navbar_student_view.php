
<div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <h5 style="color:white;">Bem-vindo <?php echo $name; ?></h5>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="/library" class="nav-link text-white">
              <i class="fa-solid fa-person"></i>
                Área do aluno
              </a>
            </li>
            <li>
              <a href="/library/listar_livro_aluno" class="nav-link text-white">
              <i class="fa-solid fa-book"></i>
                Livros disponíveis
              </a>
            </li>
            <li>
              <a href="<?php echo base_url('login/logoff') ?>" class="nav-link text-white">
              <i class="fa-solid fa-power-off"></i>
                Sair
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>