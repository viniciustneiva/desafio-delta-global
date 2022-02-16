<?php
    $tituloPagina = 'Mensagens';
    include('includes/header.php');
?>
<body>
    <div class="wrapper">
        <div class="mt-5 alert alert-info">
            <?php echo $message; ?>
            <p><?php echo anchor('alunos', 'Voltar a página anterior')?></p>
        </div>
    </div>
</body>
<?php
    include('includes/footer.php');
?>
