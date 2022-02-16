<?php

    $tituloPagina = 'Foto';

    include('includes/header.php');
    
?>
<body>
    <div class="container mt-5">
        <?php form_open_multipart(); ?>
        <div class="formCriacao">
            <div class="itemForm">
                <p class="labelFormCadastro">Foto</p> 
                <?php 
                    if(isset($aluno['foto'])){ 
                        echo '<input type="file" class="inputCadastro" name="foto" id="foto" accept="image/*">
                              <img class="thumbnailFoto" src="assets/uploads/'.$aluno["foto"].'">'; 
                    }else{
                        echo '<input type="file" class="inputCadastro" name="foto" id="foto" accept="image/*">';
                    }
                        ?>
                    
                </div>
            <div class="itemForm"><input type="submit" value="Atualizar" class="corrigeBotao btnSubmit"></div>
            <input type="hidden" name="idAluno" value="<?php if(isset($aluno['idAluno'])){ echo $aluno['idAluno']; } ?>">
        </div>
        <?php echo form_close(); ?>
    </div>
    
</body>
<?php
    include('includes/footer.php');
?>
