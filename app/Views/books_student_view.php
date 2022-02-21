<?php echo view('template/header'); ?>

    <?php echo view('template/navbar_student_view'); ?>

        <div style="padding:20px;" class="container"> 

            <div class="text-left">
                <h1>Catálogo de livros</h1>
            </div>

            <table id="tb_books_student" class="table table-striped">

                <thead>
                    <tr>
                        <th scope="col">#Cod livro</th>
                        <th scope="col">Nome livro</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Disponível</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(empty($books)) : ?>
                            <h4>Nenhum livro disponível.</h4>
                <?php endif ; ?>

                <?php foreach($books as $row)
                        {
                            $disabled = '';
                            $id = $row['id'];
                            if($row['avaliable']){
                                $row['avaliable'] = 'Sim';
                                $href = "/library/reservar_livro/$id";
                            }
                            else
                            {
                                $row['avaliable'] = 'Não';
                                $disabled = 'disabled';
                                $text = "Não disponível";
                            }
                            echo "<tr><td>".$row['id']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['pub_company']."</td>
                                    <td>".$row['description']."</td>
                                    <td>".$row['avaliable']."</td>
                                    <td><a class='btn btn-primary $disabled' href='/library/reservar_livro/$id'>Reservar</a></td>
                                </tr>";
                        }
                    ?>
                            
                </tbody>
            </table>

            <span hidden id="msg_sweet"><?php foreach(session()->getFlashdata() as $msghidden){ echo $msghidden; } ?></span>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

        <script type="text/javascript" > 

        $(document).ready( function () {
            $('#tb_books_student').DataTable({
                paging: false,
                scrollY: 400
            });
            
        } );
            
        var msg = document.getElementById('msg_sweet').textContent;
            if (msg == 'Reserva efetuada.') 
            {
                swal({
                    icon: "success",
                    text: "Reserva efetuada!"
                });  
            }


        </script>

<?php echo view('template/footer'); ?>