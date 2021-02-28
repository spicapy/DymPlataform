<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Guilherme Spica Luiz - Guilhermespicaluiz@gmail.com">
    <meta name="description" content="Dym é uma plataforma de estudos sobre a área do programação focada principalmente em JS e PHP">	<meta name="keywords" content="HTML, CSS, JS, Formulário, form, post">
    <meta name="keywords" content="Plataforma, PHP, JavaScript, Programação, Dym">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/password-redefined.css">
    <link rel="shortcut icon" href="../assets/dym-logo.svg" type="image/x-icon">
    <title>Dym</title>
</head>
<body>
    <main>
        <div class="application-main">
            <div class="form-theme-block">
                <h1 class="redefined-password-title">Recuperação de conta</h1>
                <form class="form-block" action="../controller/ControllerUser.class.php" method="post">
                    <div class="input-group">
                        <label class="label-format" for="email">Email:</label>
                        <input class="input-format" type="email" name="email" id="email" placeholder="nome@exemplo.com" autocomplete="off">
                        <span class="line-input-animation"> </span>
                    </div>
                    <div class="input-group">
                        <label class="label-format" for="password">Nova senha:</label>
                        <input class="input-format" type="password" name="password" id="password" placeholder="Digite sua senha" autocomplete="off">
                        <span class="line-input-animation"> </span>
                    </div>
                    <button class="btn-redefined-password" type="submit" name="redefined-password">Redefinir senha</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>