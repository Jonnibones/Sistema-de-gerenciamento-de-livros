<?php echo view('template/header'); ?>


    <?php echo view('template/navbar_teacher_view'); ?>

    <div style="padding:20px;" class="container">

        <h1>Lista de alunos</h1>
        <table id="tb_teacher_alunos" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#Mat Aluno</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Colégio</th>
                </tr>
            </thead>
            <tbody>

                <?php if(empty($alunos)) : ?>
                    <h4>Nenhum aluno cadastrado.</h4>
                <?php endif ; ?>

            <?php foreach($alunos as $row)
            {
                
                echo "<tr><td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['school']."</td>
                    </tr>";
            }
            ?>
                    
            </tbody>
        </table>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

    <script type="text/javascript" > 

        $(document).ready( function () {
            $('#tb_teacher_alunos').DataTable({
                paging: false,
                scrollY: 400
            });
            
        } );
        
    </script>

<?php echo view('template/footer'); ?>