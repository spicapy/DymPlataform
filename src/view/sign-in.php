<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Guilherme Angnes Zancanaro - guigui.zanca@gmail.com, Guilherme Spica Luiz - Guilhermespicaluiz@gmail.com">
	<meta name="description" content="Dym é uma plataforma de estudos sobre a área do programação focada principalmente em JS e PHP">
    <meta name="keywords" content="Plataforma, PHP, JavaScript, Programação, Dym">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/sign-in.css">
    <link rel="shortcut icon" href="../assets/dym-logo.svg" type="image/x-icon">
	<title>Faça login ou crie sua conta gratuitamente no Dym</title>
</head>
<body>
	<main>
		<div class="application-main">
			<div class="overlay-block">
			<?php
                if(isset($_SESSION['errorSignIn'])) 
                {
                    $errors = unserialize($_SESSION['errorSignIn']);
                    echo " <div class='alert-error-sign-in'>
                                <div class='alert'>
                                    <div class='alert-icon'>
                                        <img width='100%' src='../assets/error-flat.png' alt='Erro no cadastro'>
                                    </div>
                                    <p class='text-alert'>Ops! Seu login não foi bem sucedido.</p>
                                    <p class='text-alert'>$errors[0]</p>
                                </div>
                                <span class='btn-close-alert'>Fechar</span>
                            </div>";
                    unset($_SESSION['errorSignIn']);
                }
            ?>
				<div class="form-sign-in-block">
					<div class="img-sign-in-block">
						<img src="../assets/login-img.png" width="450px" alt="Faça login na sua conta">
					</div>
					<div class="block-theme-sign-in">
						<div class="block-sign-in">
							<p class="text-sign-in">Não possui uma conta ?</p>
							<a class="btn-sign-up" href="sign-up.php">Cadastre-se</a>
						</div>
						<h1 class="form-sign-in-title">Faça seu login no Dym</h1>
						<form class="form-block" action="../controller/ControllerUser.class.php" method="post">
							<div class="form-group-sign-in">
								<label class="label-group-sign-in" for="email">Email:</label>
								<input class="input-group-sign-in" type="email" name="email" id="email" placeholder="nome@exemplo.com" autocomplete="off">
								<span class="line-input-animation"> </span>
							</div>
							<div class="form-group-sign-in">
								<label class="label-group-sign-in" for="password">Senha:</label>
								<input class="input-group-sign-in" type="password" name="password" id="password" placeholder="Digite sua senha aqui" autocomplete="off">
								<span class="line-input-animation"> </span>
								<span class="btn-password-visibility">
									<i class="visibility_off material-icons">visibility_off</i>
									<i class="visibility material-icons">visibility</i>
								</span>
							</div>
							<a class="btn-forgot-password" href="password-redefined.php">Esqueceu sua senha ?</a>
							<div class="sign-in-connect-block">
								<button class="btn-sign-in" type="submit" name="signIn">Entrar</button>
								<div class="btn-checkbox-connected">
									<div class="circle-btn-checkbox-connected"></div>
								</div>
								<span class="connected-text">Me mantenha conectado</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script src="../javascript/script-sign-in.js"></script>
</body>
</html>
