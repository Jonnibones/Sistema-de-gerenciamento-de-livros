
<div class="px-3 py-2 bg-dark text-white header fixed-top position-sticky">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <h5 style="color:white;">Bem-vindo <?php echo $_SESSION['name'];?></h5>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="/library" class="nav-link text-white">
              <i class="fa-solid fa-chalkboard-user"></i>
                Área do professor
              </a>
            </li>
            <li>
              <a href="/library/listar_livros" class="nav-link text-white">
              <i class="fa-solid fa-gear"></i>
                Gerenciar livros
              </a>
            </li>
            <li>
              <a href="/library/listar_livro_professor" class="nav-link text-white">
              <i class="fa-solid fa-book"></i>
                Lista de livros
              </a>
            </li>
            <li>
              <a href="/library/listar_alunos" class="nav-link text-white">
              <i class="fa-solid fa-person"></i>
                Lista de alunos
              </a>
            </li>
            <li>
              <a href="/login/logoff" class="nav-link text-white">
              <i class="fa-solid fa-power-off"></i>
                Sair
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>