<?php
    $tituloPagina = 'Alunos';
    include('includes/header.php');
?>

<body>
    <div class="wrapper">
        <div class="container mt-5 mb-5">
            <?php echo anchor('aluno/create', 'Novo aluno', ['class' => 'btn btn-success mb-3']) ?>
            <table class="table">
                <tr>
                    <th>id</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>

                <?php foreach($alunos as $aluno): ?>
                    <tr>    
                        <td><?php echo $aluno['idAluno'] ?></td>
                        <td><?php echo $aluno['foto'] ?></td>
                        <td><?php echo $aluno['nome'] ?></td>
                        <td><?php echo "".$aluno['logradouro'].", ".$aluno['numero'].", ".$aluno['bairro'].", ".$aluno['cidade'].""; ?></td>
                        <td>
                            <?php echo anchor('alunos/edit/'.$aluno['idAluno'], 'Editar') ?>
                            |
                            <?php echo anchor('alunos/delete/'.$aluno['idAluno'], 'Excluir', ['onclick' => 'return confirma()']) ?>
                        </td> 
                    </tr>
                <?php endforeach ?>

            </table>
            <?php echo $pager->links()." "; ?>
        </div>
    </div> 
</body>  

<?php
    include('includes/footer.php');
?>
