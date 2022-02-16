<?php
    $tituloPagina = 'Cadastrar Aluno';
    $this->extend('includes/layouts');
    $this->section('content');
?>
<body>
    <div class="container mt-5">
        <?php echo form_open_multipart('Aluno/store') ?>
            <div class="formCriacao">
                <div class="itemForm">
                    <p class="labelFormCadastro">Nome Completo</p> 
                    <input type="text" value="<?php if(isset($aluno['nome'])){ echo $aluno['nome']; } ?>" class="inputCadastro" placeholder="Nome Completo" name="nome" id="nome" required>
                </div>
                <div class="itemForm">
                    <div class="umMeio">
                        <p class="labelFormCadastro">Endereço</p> 
                        <input type="text" value="<?php if(isset($aluno['logradouro'])){ echo $aluno['logradouro']; } ?>" class="inputCadastro" placeholder="Endereço" name="logradouro" id="logradouro" required>
                </div>
                    <div class="umMeio">
                        <p class="labelFormCadastro">Número</p> 
                        <input type="number" value="<?php if(isset($aluno['numero'])){ echo $aluno['numero']; } ?>" class="inputCadastro" placeholder="Número Residencial" name="numero" id="numero">
                    </div>
                </div>
                <div class="itemForm">
                    <div class="umMeio">
                        <p class="labelFormCadastro">Bairro</p> 
                        <input type="text" value="<?php if(isset($aluno['bairro'])){ echo $aluno['bairro']; } ?>"  class="inputCadastro" placeholder="Bairro" name="bairro" id="bairro" required>
                    </div>
                    <div class="umMeio">
                        <p class="labelFormCadastro">Cidade</p> 
                        <input type="text" value="<?php if(isset($aluno['cidade'])){ echo $aluno['cidade']; } ?>" class="inputCadastro" placeholder="Cidade" name="cidade" id="cidade" required>
                    </div>
                </div>
                
                <div class="itemForm">
                    <p class="labelFormCadastro">Foto</p> 
                    <?php echo form_upload('foto','',['class' => 'inputCadastro', 'id' => 'foto', 'accept' => "image/jpg, image/jpeg"])?>                
                </div>
                <div class="itemForm">
                    <?php 
                        if(!empty($aluno['foto'])){ 
                            echo '
                            <img class="thumbnailFoto" src="../../assets/uploads/'.$aluno["foto"].'">'; 
                        }
                    ?>
                </div>
                <input type="hidden" name="idAluno" value="<?php if(isset($aluno['idAluno'])){ echo $aluno['idAluno']; } ?>">
                <div class="itemForm"><input type="submit" value="Cadastrar" class="corrigeBotao btnSubmit"></div>
                
            </div>
        
             <?php echo form_close(); ?>
             <a href="/">Voltar ao início</a>
    </div>

</body>

<?php
    $this->endSection();
?>