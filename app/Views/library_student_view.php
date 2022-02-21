<?php echo view('template/header'); ?>


    <?php echo view('template/navbar_student_view'); ?>

    <div class="container " style="padding:20px;">
        <div class="row">

            <div class="col"  id="col_dados">

                <div class="text-left">
                    <h1>Seus dados</h1>
                </div>

                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo "Nome: " .$_SESSION['name']; ?></li>
                        <li class="list-group-item"><?php echo "e-mail: " .$_SESSION['email']; ?></li>
                        <li class="list-group-item"><?php echo "Matrícula: " .$_SESSION['id']; ?></li>
                    </ul>
                    <div class="card-footer">
                        <a class="btn btn-warning" href="/library/editarAluno/<?php echo $_SESSION['id']; ?>">Editar dados</a>
                    </div>
                </div>

                
                <div <?php if(isset($hidden)){ echo $hidden; }else{ echo "hidden";} ?> class='container'>

        
                <span hidden id="msg_sweet"><?php foreach(session()->getFlashdata() as $msghidden){ echo $msghidden; } ?></span> 

                <hr>
                <h2>Editar dados</h2>

                <div class="row">

                    <form action="/library/editAluno" method="post">

                        <div class="row">

                            <div hidden class="col mb-3">
                                <input value="<?php if(isset($user)){echo $user['id'];}?>"  name="id" type="text" class="form-control">
                            </div>

                            <div class="col mb-3">
                                <label class="form-label">Nome:</label>
                                <input value="<?php if(isset($user)){echo $user['name'];}?>"  name="name" type="text" class="form-control">
                            </div>

                            <div class="col mb-3">
                                <label class="form-label">E-mail</label>
                                <input value="<?php if(isset($user)){echo $user['email'];}?>" name="email" type="text" class="form-control" >
                            </div>

                        </div>

                        <div class="row">

                            <div class="col mb-3">
                                <label class="form-label">Colégio</label>
                                <input value="<?php if(isset($user)){echo $user['school'];}?>" name="school" type="text" class="form-control">
                            </div>

                        </div>

                        <div class="d-grid gap-2">
                            <input class="btn btn-warning" type="submit" value="Editar">
                        </div>

                    </form> 
                    
                </div>
                </div>



            </div>
            <br>
         
            <!-------------------------------------------------------------------------->
            <div style="padding: 20px;" class="col" id="col_table">
                <div class="text-left">
                    <h1>Suas reservas</h1>
                </div>
                <table id="tb_student" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#Cod livro</th>
                            <th scope="col">Nome livro</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Data da reserva</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php if(isset($reservs)): ?>
                        
                        <?php if(empty($reservs)) : ?>
                            <h4>Nenhuma reserva.</h4>
                            <?php endif ; ?>

                        <?php foreach($reservs as $row): ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['pub_company'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><a onclick="return confirm('Tem certeza que deseja deletar este registro?')" class="btn btn-danger btn-sm"
                                 href="/library/deletar_reserva/<?php echo $row['id_reservation'];?>"> Cancelar reserva</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ; ?>
                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script type="text/javascript" >

        $(document).ready( function () {
            $('#tb_student').DataTable({
                paging: false,
                scrollY: 400
            });
            
        } );
        
      var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Registro editado.') 
        {
            swal({
                icon: "success",
                text: "Informações atualizadas!"
              });  
        }

        
        var msg = document.getElementById('msg_sweet').textContent;
        if (msg == 'Reserva cancelada.') 
        {
            swal({
                icon: "success",
                text: "Reserva cancelada!"
              });  
        }


    </script>



<?php echo view('template/footer'); ?>
