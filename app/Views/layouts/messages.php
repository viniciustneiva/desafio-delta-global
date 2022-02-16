<?php
    $tituloPagina = 'Mensagens';
    $this->extend('includes/layouts');
    $this->section('content');
?>
<body>
    <div class="wrapper">
        <div class="mt-5 alert alert-info">
            <?php echo $message; ?>
            <p><?php echo anchor('/', 'Voltar a página anterior')?></p>
        </div>
    </div>
</body>
<?php
    $this->endSection();
?>
