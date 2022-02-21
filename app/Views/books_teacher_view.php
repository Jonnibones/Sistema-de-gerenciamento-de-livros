<?php echo view('template/header'); ?>


<?php echo view('template/navbar_teacher_view'); ?>

    <div class="container">

        <div class="row">

            <div class="col">

            <form action="cadastrar_livro" method="POST">

            <span hidden id="msg_sweet"><?php foreach(session()->getFlashdata() as $msghidden){ echo $msghidden; } ?></span> 

            <?php if(session()->getFlashdata('msg')):?>
                <div style=" margin-bottom: -60px;" id="div_errors_reg" class="alert alert-primary"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>

                <div><h2>Cadastrar um livro</h2></div>

                <div hidden class="mb-3">
                    <input name="id_user" value="<?php echo $_SESSION['id'];?>"  type="text" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome do livro</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="mb-3">
                    <label for="exampleInputpubcompny" class="form-label">Editora</label>
                    <input name="pub_company" type="text" class="form-control" id="exampleInputpubcompny">
                </div>

                <div class="mb-3">
                    <label for="exampleInputdescrption" class="form-label">Descrição</label>
                    <input name="description" type="text" class="form-control" id="exampleInputdescrption">
                </div>

                <button type="submit" class="btn btn-success">Cadastrar</button>

            </form>

            </div>

            <div class="col">

                <div class="text-left">
                        <h1>Catálogo de livros</h1>
                </div>

                <table id="tb_teacher" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Cod livro</th>
                            <th scope="col">Nome livro</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Disponível</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //if(isset($teste)){var_dump($teste);} ?>

                       <?php foreach($books as $row): ?>
                          <?php if($row['avaliable']){
                                $disabled = '';
                                $text = 'Deletar';
                                $row['avaliable'] = 'Sim';
                           }
                           else
                           {
                                $disabled = 'disabled';
                                $text = 'Livro reservado';
                                $row['avaliable'] = 'Não';
                           }
                           ?>

                            <tr><td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['pub_company'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <td><?php echo $row['avaliable'];?></td>
                                <td><a href="/library/editar_livros/<?php echo $row['id']; ?>" class='btn btn-warning btn-sm'>Editar</a>
                                <hr>
                                <a href="/library/deletar_livros/<?php echo $row['id']; ?>" class="btn btn-danger btn-sm <?php echo $disabled; ?>"><?php echo $text; ?></a>
                            </tr>
                       
                        <?php endforeach ; ?>
                             
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row">

            <div class="col">
            </div>

            <div <?php if(isset($hidden)){ echo $hidden; }else{ echo "hidden";} ?> class="col">

                <form action="/library/edit_livros" method="post">
                            
                    <div class="row">
                        <div hidden class="col mb-3">
                            <input value="<?php if(isset($book_edit)){echo $book_edit['id'];}?>"  name="id" type="text" class="form-control">
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Nome do livro:</label>
                            <input value="<?php if(isset($book_edit)){echo $book_edit['name'];}?>"  name="name" type="text" class="form-control">
                        </div>

                        <div class="col mb-3">
                            <label class="form-label">Editora</label>
                            <input value="<?php if(isset($book_edit)){echo $book_edit['pub_company'];}?>" name="pub_company" type="text" class="form-control" >
                        </div>

                    </div>

                    <div class="row">

                        <div class="col mb-3">
                            <label class="form-label">Descrição</label>
                            <input value="<?php if(isset($book_edit)){echo $book_edit['description'];}?>" name="description" type="text" class="form-control">
                        </div>

                        <div class="col mb-3">
                            <input class="btn btn-warning" type="submit" value="Editar">
                        </div>
                    </div>

                </form> 

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" >
        
      var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Registro editado.') 
        {
            swal({
                icon: "success",
                text: "Livro editado!"
              });  
        }

        var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Livro cadastrado com sucesso.') 
        {
            swal({
                icon: "success",
                text: "Livro cadastrado!"
              });  
        }

        var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Livro deletado.') 
        {
            swal({
                icon: "success",
                text: "Livro deletado com sucesso!"
              });  
        }

    </script>

<?php echo view('template/footer'); ?>