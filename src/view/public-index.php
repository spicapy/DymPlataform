<?php
session_start();
ob_start();

if(isset($_POST['logout']))
{
    unset($_SESSION['signIn']);
    unset($_SESSION['avatar-user']);
}

if(isset($_SESSION['signIn']))
{
    include_once '../model/User.class.php';
    $user = new User;
    $user = unserialize($_SESSION['signIn']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Guilherme Spica Luiz">
	<meta name="description" content="Dym é uma plataforma de estudos sobre a área do programação focada principalmente em JS e PHP">
    <meta name="keywords" content="Plataforma, PHP, JavaScript, Programação, Dym">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../styles/global.css">
    <link rel="stylesheet" href="../styles/public-index.css">
    <link rel="shortcut icon" href="../assets/dym-logo.svg" type="image/x-icon">
    <title>Dym</title>
</head>
<body>
    <main>
        <div class="application-main">
            <header>
                <nav class="nav-public-index">
                    <a class="logo-public-index" href="/">
                        <svg width="40" height="40" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M78.4952 117.095C102.582 109.298 120 86.6833 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120C64.3007 120 68.4957 119.548 72.54 118.688C69.7457 118.783 66.6514 118.027 64.0093 115.668C63.8558 115.531 63.6849 115.385 63.5019 115.229C61.4664 113.494 57.9421 110.49 60.327 103.971H58.5941C58.8108 105.993 58.3775 109.17 51.2295 109.17C48.4136 109.17 45.3378 109.126 44.2981 106.354C41.9877 106.787 36.7602 107.09 34.3342 104.838C34.2838 104.764 34.2312 104.689 34.1771 104.612C33.3785 103.47 32.2781 101.898 33.901 100.072C35.8505 98.556 36.7169 98.1227 36.9335 98.1227L38.0165 85.1264L34.3342 73.4296C33.901 72.3466 33.0346 64.7653 36.0671 61.2996V58.4838C32.6736 55.8845 26.1032 50.0361 25.67 47.0036C25.2367 45.4874 26.1032 35.5235 27.836 34.2238C27.2584 33.3574 26.1898 29.9783 26.5364 23.3935C28.4858 23.3935 34.984 23.3935 39.0996 27.509C40.6158 25.9928 52.3126 24.4765 55.9949 29.0253C56.1562 28.9536 56.3294 28.873 56.5162 28.7861C58.5864 27.8226 62.3257 26.0824 70.0743 27.0758C70.2187 29.8195 69.9443 36.0866 67.6916 39.2058C67.7546 39.3948 67.8213 39.589 67.8897 39.7881C68.9966 43.0115 70.5501 47.5353 64.2259 52.6354C65.3089 53.0686 67.6916 55.2347 69.4245 60.2166C70.5797 63.0325 73.3234 68.7942 75.0562 69.3141C76.5725 70.1805 83.9371 75.3791 88.9191 86.426C89.7855 88.5921 90.0021 91.0313 88.9191 96.9597C90.5075 97.3474 93.8144 99.2924 94.3342 103.971C94.3342 104.009 94.335 104.055 94.336 104.11C94.3571 105.318 94.4483 110.526 87.4028 111.769C85.8144 111.841 84.274 111.456 82.83 111.095C79.9419 110.373 77.4389 109.747 75.7061 113.069C75.6369 113.201 75.4895 114.585 80.2548 115.668C79.9101 116.142 79.2997 116.641 78.4952 117.095Z" fill="white"/>
                        </svg>
                    </a>
                    <form class="form-search-block" action="" method="post">
                        <div class="input-search-block">
                            <input class="input-search" type="text" name="input-search" placeholder="Pesquisar no Dym" autocomplete="off">
                        </div>
                    </form>
                    <div class="navbar flex">
                        <a href="error-screen.html" class="links-navbar links-public-index-navbar">Favoritos</a>
                        <a href="src/view/developers-screen.html" class="links-navbar links-public-index-navbar">Cronograma</a>
                        <a href="error-screen.html" class="links-navbar links-public-index-navbar">Plataforma</a>
                        <span class="links-navbar links-public-index-navbar separator">|</span>
                        <a href="error-screen.html" class="links-navbar links-public-index-navbar">Desenvolvedores</a>
                        <a href="error-screen.html" class="links-navbar links-public-index-navbar">Suporte</a>
                    </div>
                    <form action="public-index.php" method="post">
                        <button class="btn-logout" name="logout">Sair</button>
                    </form>
                </nav>
            </header>
            <div class="side-bar">
                <div class="side-bar-theme">
                    <form class="form-avatar" action="../controller/ControllerUser.class.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="avatar-file" id="avatar-file">
                        <button type="submit" name="submit-avatar" id="submit-avatar">Enviar</button>
                    </form>
                    <header class="top-bar">
                       <div class="image-avatar">
                           <?php
                                if(isset($_SESSION['avatar-user']))
                                {
                                    $avatar = unserialize($_SESSION['avatar-user']);
                                    echo '<img src ="data:'.$avatar['type'].';base64,'.base64_encode($avatar['data']).'" class="avatar" width="100%" height="100%"/>';
                                } else
                                {
                           ?>
                           <img class="avatar" width="100%" height="100%" src="../assets/avatar-default.png" alt="">
                           <?php
                                }
                           ?>
                           <label class="change-avatar" for="avatar-file">Mudar Avatar</label>
                       </div>
                       <div class="user-info">
                            <h2 class="username"><?php echo $user->userName?></h2>
                            <h3 class="id-user"><?php echo "#".rand(100, 999) . $user->idUser?></h3>
                            <span class="material-icons alter-user-settings">mode</span>
                       </div>
                    </header>
                    <div class="user-settings">
                        <form class="btn-delete-account" action="../controller/ControllerUser.class.php" method="post">
                            <button class="btn-logout" type="submit" name="delete">Excluir conta</button>
                        </form>
                    </div>
                </div>
                <div class="close-side-bar">
                    <span class="material-icons">arrow_back_ios_new</span>
                </div>
            </div>
            <div class="overlay-alter">
                <div class="form-block-alter">
                    <h1 class="title-alter">Alterar usuário</h1>
                    <form class="form-alter" action="../controller/ControllerUser.class.php" method="post">
                        <div class="form-group-alter">
                            <label class="label-group-alter" for="name">Nome de Usuário:</label>
                            <input class="input-group-alter" type="text" name="name" id="name" value="<?php echo $user->userName?>" autocomplete="off">
                            <span class="line-input-animation"> </span>
                        </div>
                        <div class="form-group-alter">
                            <label class="label-group-alter" for="email">Email:</label>
                            <input class="input-group-alter" type="email" name="email" id="email" value="<?php echo $user->email?>" autocomplete="off">
                            <span class="line-input-animation"> </span>
                        </div>
                        <div class="form-group-alter">
                            <label class="label-group-alter" for="cpf">CPF:</label>
                            <input class="input-group-alter" type="text" name="cpf" id="cpf" value="<?php echo $user->cpf?>" autocomplete="off" maxlength="11">
                            <span class="line-input-animation"> </span>
                        </div>
                        <div class="form-group-alter">
                            <label class="label-group-alter" for="cpf">Senha:</label>
                            <input class="input-group-alter" type="password" name="password" id="password" autocomplete="off" maxlength="11">
                            <span class="line-input-animation"> </span>
                        </div>
                        <div class="btn-block-alter">
                            <span class="btn-cancel">Cancelar</span>
                            <button class="btn-alter" type="submit" name="alter">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-path-block">
                <div class="text-card-path">
                    <h3 class="title-card-path">Escolha o seu próprio caminho</h3>
                    <p class="description-card-path"><strong>Atenção: </strong>Escolha por qual caminho você deseja seguir, mas escolha com sabedoria e tenha foco nessa sua jornada.</p>
                </div>
                <div class="card-path">
                    <div class="card laravel-card">
                        <header class="top-card">
                            <div class="image-card laravel-background">
                                <img width="100%" src="../assets/laravel.svg" alt="Laravel">
                            </div>
                            <h2 class="title-card laravel-text">Laravel</h2>
                            <h3 class="application-card laravel-text">Back-end</h3>
                        </header>
                        <div class="content-item">
                            <p class="description-card">Se o seu objetivo é programar no back-end em php, escolha Laravel. Laravel é um framework PHP livre e open-source para o desenvolvimento de sistemas web que utilizam o padrão MVC.</p>
                            <button class="btn-path laravel-background laravel-btn">Escolha Laravel</button>
                        </div>
                    </div>
                    <div class="card react-card">
                        <header class="top-card">
                            <div class="image-card react-background">
                                <img width="100%" src="../assets/react.svg" alt="React">
                            </div>
                            <h2 class="title-card react-text">React</h2>
                            <h3 class="application-card react-text">Front-end</h3>
                        </header>
                        <div class="content-item">
                            <p class="description-card">Se o seu objetivo é programar no front-end, escolha React. React é a biblioteca JavaScript de código aberto mais usada no mercado. Ela tem como foco, criar interfaces de usuário em páginas web.</p>
                            <button class="btn-path react-background react-btn">Escolha React</button>
                        </div>
                    </div>
                    <div class="card kotlin-card">
                        <header class="top-card">
                            <div class="image-card kotlin-background">
                                <img width="100%" src="../assets/kotlin.svg" alt="kKotlin">
                            </div>
                            <h2 class="title-card kotlin-text">Kotlin</h2>
                            <h3 class="application-card kotlin-text">Back-end</h3>
                        </header>
                        <div class="content-item">
                            <p class="description-card">Se o seu objetivo é programar back-end com android, escolha Kotlin. Kotlin é uma linguagem de fácil aprendizado, oo, desenvolvida pela JetBrains, que consegue compilar para o Java Virtual Machine.</p>
                            <button class="btn-path kotlin-background kotlin-btn">Escolha React</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </main>
    <script src="../javascript/script-public-index.js"></script>
</body>
</html>
<?php
}
else{
    header("location:../../index.php");
}
?>