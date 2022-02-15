

<?php echo view('template/header'); ?>

    <div id="div_form_login" class="container container-fluid">
        <form action="/action_page.php">
            <h1>Library T-Max </h1>
            <div class="formcontainer">
                <hr/>
                <div class="container">
                    <label for="uname"><strong>Login</strong></label>
                    <input type="text" placeholder="Login" name="uname" required>
                    <label for="psw"><strong>Senha</strong></label>
                    <input type="password" placeholder="Senha" name="psw" required>
                </div>
                <button type="submit">Entrar</button>
                <div class="container" style="background-color: #eee">
                    <a class="btn btn-primary btn-lg btn-block" href="#">Cadastre-se</a>
            </div>
        </form>
    </div>

<?php echo view('template/footer'); ?>

