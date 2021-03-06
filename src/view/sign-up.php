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
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/sign-up.css">
    <link rel="shortcut icon" href="../assets/dym-logo.svg" type="image/x-icon">
	<title>Crie sua conta gratuitamente no Dym</title>
</head>
<body>
	<main>
        <header>
            <nav class="nav">
                <a class="logo" href="/">
                    <svg width="48" height="48" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M78.4952 117.095C102.582 109.298 120 86.6833 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120C64.3007 120 68.4957 119.548 72.54 118.688C69.7457 118.783 66.6514 118.027 64.0093 115.668C63.8558 115.531 63.6849 115.385 63.5019 115.229C61.4664 113.494 57.9421 110.49 60.327 103.971H58.5941C58.8108 105.993 58.3775 109.17 51.2295 109.17C48.4136 109.17 45.3378 109.126 44.2981 106.354C41.9877 106.787 36.7602 107.09 34.3342 104.838C34.2838 104.764 34.2312 104.689 34.1771 104.612C33.3785 103.47 32.2781 101.898 33.901 100.072C35.8505 98.556 36.7169 98.1227 36.9335 98.1227L38.0165 85.1264L34.3342 73.4296C33.901 72.3466 33.0346 64.7653 36.0671 61.2996V58.4838C32.6736 55.8845 26.1032 50.0361 25.67 47.0036C25.2367 45.4874 26.1032 35.5235 27.836 34.2238C27.2584 33.3574 26.1898 29.9783 26.5364 23.3935C28.4858 23.3935 34.984 23.3935 39.0996 27.509C40.6158 25.9928 52.3126 24.4765 55.9949 29.0253C56.1562 28.9536 56.3294 28.873 56.5162 28.7861C58.5864 27.8226 62.3257 26.0824 70.0743 27.0758C70.2187 29.8195 69.9443 36.0866 67.6916 39.2058C67.7546 39.3948 67.8213 39.589 67.8897 39.7881C68.9966 43.0115 70.5501 47.5353 64.2259 52.6354C65.3089 53.0686 67.6916 55.2347 69.4245 60.2166C70.5797 63.0325 73.3234 68.7942 75.0562 69.3141C76.5725 70.1805 83.9371 75.3791 88.9191 86.426C89.7855 88.5921 90.0021 91.0313 88.9191 96.9597C90.5075 97.3474 93.8144 99.2924 94.3342 103.971C94.3342 104.009 94.335 104.055 94.336 104.11C94.3571 105.318 94.4483 110.526 87.4028 111.769C85.8144 111.841 84.274 111.456 82.83 111.095C79.9419 110.373 77.4389 109.747 75.7061 113.069C75.6369 113.201 75.4895 114.585 80.2548 115.668C79.9101 116.142 79.2997 116.641 78.4952 117.095Z" fill="white"/>
                    </svg>
                </a>
                <div class="navbar">
                    <a href="error-screen.html" class="links-navbar">O que é "Dym"</a>
                    <a href="src/view/developers-screen.html" class="links-navbar">Desenvolvedores</a>
                    <a href="error-screen.html" class="links-navbar">Caracteristicas</a>
                    <a href="error-screen.html" class="links-navbar">Suporte</a>
                    <a href="error-screen.htmll" class="links-navbar">Premium</a>
                </div>
                <a class="btn-sign-in links-navbar" href="sign-in.php">Entrar</a>
            </nav>
        </header>
		<div class="form-section">
            <?php
                if(isset($_SESSION['errorSignUp'])) 
                {
                    $errors = unserialize($_SESSION['errorSignUp']);
                    echo " <div class='alert-error-sign-up'>
                                <div class='alert'>
                                    <div class='alert-icon'>
                                        <img width='100%' src='../assets/error-flat.png' alt='Erro no cadastro'>
                                    </div>
                                    <p class='text-alert'>Ops! Tivemos um erro para fazer seu cadastro.</p>
                                    <p class='text-alert'>$errors[0]</p>
                                </div>
                                <span class='btn-close-alert'>Fechar</span>
                            </div>";
                    unset($_SESSION['errorSignUp']);
                }
            ?>
			<div class="form-container">
				<h1 class="form-title">Crie sua conta no "Dym"</h1>
				<form action="../controller/ControllerUser.class.php" method="post">
					<div class="form-group">
						<input class="input-format" type="text" name="name" id="name" placeholder="Nome de Usuário" autocomplete="off">
						<span class="line-input-animation"> </span>
					</div>
					<div class="form-group">
						<input class="input-format" type="text" name="email" id="email" placeholder="Email" autocomplete="off">
						<span class="line-input-animation"> </span>
						<span class="warning-span">Não iremos divulgar seu endereço de email para ninguém sem a sua autorização.</span>
					</div>
					<div class="form-group">
						<input class="input-format" type="text" name="cpf" id="cpf" placeholder="CPF" autocomplete="off" maxlength="14" onkeyup="mask()" >
						<span class="line-input-animation"> </span>
					</div>
					<div class="form-group">
						<input class="input-format" type="text" name="password" id="password" placeholder="Senha" autocomplete="off">
						<span class="line-input-animation"> </span>
						<span class="warning-span">Certifique-se de que sua senha possua <strong class="warning-green">no minimo 8 caracteres</strong> e <strong class="warning-red">no máximo 15 caracteres</strong> incluindo números e símbolos.</span>
					</div>
					<button class="btn-submit" type="submit" name="sign-up">Criar sua conta</button>
				</form>
			</div>
		</div>
        <footer class="footer">
			<div class="footer-wave-transition-block">
				<svg width="100%" viewBox="0 0 1920 140" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1920 0V96.5365C1177.69 152.629 757.795 156.317 0 96.5365V0L1920 0Z" fill="white"/>
				</svg>
			</div>
            <div class="division-social-block">
                <div class="company-social-block">
                    <div class="logo-footer-block">
                        <a href="/">
                            <svg width="48" height="48" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M78.4952 117.095C102.582 109.298 120 86.6833 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120C64.3007 120 68.4957 119.548 72.54 118.688C69.7457 118.783 66.6514 118.027 64.0093 115.668C63.8558 115.531 63.6849 115.385 63.5019 115.229C61.4664 113.494 57.9421 110.49 60.327 103.971H58.5941C58.8108 105.993 58.3775 109.17 51.2295 109.17C48.4136 109.17 45.3378 109.126 44.2981 106.354C41.9877 106.787 36.7602 107.09 34.3342 104.838C34.2838 104.764 34.2312 104.689 34.1771 104.612C33.3785 103.47 32.2781 101.898 33.901 100.072C35.8505 98.556 36.7169 98.1227 36.9335 98.1227L38.0165 85.1264L34.3342 73.4296C33.901 72.3466 33.0346 64.7653 36.0671 61.2996V58.4838C32.6736 55.8845 26.1032 50.0361 25.67 47.0036C25.2367 45.4874 26.1032 35.5235 27.836 34.2238C27.2584 33.3574 26.1898 29.9783 26.5364 23.3935C28.4858 23.3935 34.984 23.3935 39.0996 27.509C40.6158 25.9928 52.3126 24.4765 55.9949 29.0253C56.1562 28.9536 56.3294 28.873 56.5162 28.7861C58.5864 27.8226 62.3257 26.0824 70.0743 27.0758C70.2187 29.8195 69.9443 36.0866 67.6916 39.2058C67.7546 39.3948 67.8213 39.589 67.8897 39.7881C68.9966 43.0115 70.5501 47.5353 64.2259 52.6354C65.3089 53.0686 67.6916 55.2347 69.4245 60.2166C70.5797 63.0325 73.3234 68.7942 75.0562 69.3141C76.5725 70.1805 83.9371 75.3791 88.9191 86.426C89.7855 88.5921 90.0021 91.0313 88.9191 96.9597C90.5075 97.3474 93.8144 99.2924 94.3342 103.971C94.3342 104.009 94.335 104.055 94.336 104.11C94.3571 105.318 94.4483 110.526 87.4028 111.769C85.8144 111.841 84.274 111.456 82.83 111.095C79.9419 110.373 77.4389 109.747 75.7061 113.069C75.6369 113.201 75.4895 114.585 80.2548 115.668C79.9101 116.142 79.2997 116.641 78.4952 117.095Z" fill="white"/>
                            </svg>
                        </a>
                        <h1 class="title-company">Dym</h1>
                    </div>
                    <div class="social-icons-block">
                        <a href="error-screen.htmll">
                            <img width="32" src="../assets/twitter-icon.png" alt="twitter">
                        </a>
                        <a href="error-screen.htmll">
                            <img width="32" src="../assets/instagram-icon.png" alt="instagram">
                        </a>
                        <a href="error-screen.htmll">
                            <img width="45" src="../assets/git-icon.png" alt="github">
                        </a>
                        <a href="error-screen.htmll">
                            <img width="32" src="../assets/fb-icon.png" alt="facebook">
                        </a>                      
                    </div>
                </div>  
            </div>
            <div class="division-terms-block">
                <div class="terms-block">
                    <h2 class="title-terms-block">Empresa</h2>
                    <div class="terms-text-block">
                        <a href="error-screen.html" class="links-terms">Sobre</a>
                        <a href="error-screen.htmll" class="links-terms">Empregos</a>
                        <a href="error-screen.htmll" class="links-terms">Marca</a>
                    </div>
                </div>
                <div class="terms-block">
                    <h2 class="title-terms-block">Plataforma</h2>
                    <div class="terms-text-block">
                        <a href="error-screen.html" class="links-terms">O que é Dym</a>
                        <a href="error-screen.html" class="links-terms">Status</a>
                        <a href="error-screen.htmll" class="links-terms">Premium</a>
                    </div>
                </div>
                <div class="terms-block">
                    <h2 class="title-terms-block">Recursos</h2>
                    <div class="terms-text-block">
                        <a href="error-screen.html" class="links-terms">Suporte</a>
                        <a href="error-screen.html" class="links-terms">Segurança</a>
                        <a href="src/view/developers-screen.html" class="links-terms">Desenvolvedores</a>
                        <a href="error-screen.htmll.html" class="links-terms">Moderação</a>
                        <a href="error-screen.htmll.html" class="links-terms">Código aberto</a>
                        <a href="error-screen.htmll.html" class="links-terms">Comunidade</a>
                    </div>
                </div>
                <div class="terms-block">
                    <h2 class="title-terms-block">Política</h2>
                    <div class="terms-text-block">
                        <a href="error-screen.htmll.html" class="links-terms">Termos</a>
                        <a href="error-screen.htmll.html" class="links-terms">Privacidade</a>
                        <a href="error-screen.htmll.html" class="links-terms">Diretrizes</a>
                        <a href="error-screen.htmll.html" class="links-terms">Licenças</a>
                    </div>
                </div>
            </div>
		</footer>
	</main>
    <script src="../javascript/script.sign-up.js"></script>
</body>
</html>
