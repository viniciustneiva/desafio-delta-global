<?php

    $tituloPagina = 'Alunos';

    include('includes/header.php');
    
?>

<body>
	<div class="wrapper">
		<div class="cartao">
			<div class="itemBox">
				<h2 class="tituloCard">Acesse sua conta</h2>
				<p class="textoCard">Esta é apenas uma página de teste, o acesso e manipulação dos alunos, só é permitido após a autenticação.</p>
			</div>
			<div class="itemBox">
				<div class="wrapperForm">
					<form action="" class="formulario">
						<input type="text" name="login" placeholder="Login" id="inputLogin" required>
						<input type="password" name="senha" id="inputSenha" placeholder="Senha" required>
						<div><input type="submit" value="Entrar" class="btnSubmit"></div>
					</form>
				</div>	
			</div>
		</div>
	</div>
	
</body>

<?php
    include('includes/footer.php');
?>