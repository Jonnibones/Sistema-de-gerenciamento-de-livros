<?php echo view('template/header'); ?>


    <?php echo view('template/navbar_teacher_view'); ?>

    <div class="container">

        <h2>Lista de alunos</h2>
        <table id="tb_teacher" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#Mat Aluno</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Colégio</th>
                </tr>
            </thead>
            <tbody>

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

<?php echo view('template/footer'); ?>