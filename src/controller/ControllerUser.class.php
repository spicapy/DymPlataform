<?php
session_start();
ob_start();
//Desenvolvido por Guilherme Spica Luiz
include_once '../model/User.class.php';
include_once '../util/Conversion.class.php';
include_once '../util/Segurity.class.php';
include_once '../util/Validation.class.php';
include_once '../database/UserDatabase.class.php';

if(isset($_POST['sign-up']))
{
    $errors = [];

    if(!Validation::validateName($_POST['name']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Nome."; 
    }

    if(!Validation::validateCPF($_POST['cpf']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo CPF."; 
    }

    if(!Validation::validateEmail($_POST['email']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Email.";  
    }

    if(!Validation::validatePassword($_POST['password']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Senha.";  
    }

    if(sizeof($errors) == 0)
    {
        $user = new User;
        $user->userName = Conversion::standardizeName(Segurity::XSS($_POST['name']));
        $user->cpf = Conversion::standardizeCPF(Segurity::XSS($_POST['cpf']));
        $user->email = Conversion::standardizeEmail(Segurity::XSS($_POST['email']));
        $user->password = Segurity::encrypt($_POST['password']);

        $userDatabase = new UserDatabase;
        $userDatabase->registerUser($user);

        $user = $userDatabase->registerSignInUser($user);
        
        if($user == null)
        {
            $errors[] = "Ops! Parece que esse Email ou CPF já estão cadastrados.";  
            $_SESSION['errorSignUp'] = serialize($errors);
            header("location:../view/sign-up.php");
        } else 
        {
            $_SESSION['signIn'] = serialize($user);
            header("location:../view/public-index.php");
        }
    } else 
    {
        $_SESSION['errorSignUp'] = serialize($errors);
        header("location:../view/sign-up.php");
    }
}

if(isset($_POST['signIn']))
{
    $errorsSignIn = [];

    if(!Validation::validateEmail($_POST['email']))
    {
        $errorsSignIn[] = "Ops! Parece que teve um erro no campo Email.";
    }

    if(!Validation::validatePassword($_POST['password']))
    {
        $errorsSignIn[] = "Ops! Parece que teve um erro no campo Senha.";
    }

    if(sizeof($errorsSignIn) == 0)
    {
        $userSignIn = new User;
        $userSignIn->email = Conversion::standardizeEmail(Segurity::XSS($_POST['email']));
        $userSignIn->password = $_POST['password'];

        $userDatabase = new UserDatabase;
        $userSignIn = $userDatabase->signInUser($userSignIn);

        if($userSignIn == null)
        {
            $errorsSignIn[] = "Ops! O Email não foi encontrado ou a Senha está incorreta.";
            $_SESSION['errorSignIn'] = serialize($errorsSignIn);
            header("location:../view/sign-in.php");
        } else 
        {
            $_SESSION['signIn'] = serialize($userSignIn);
            header("location:../view/public-index.php");
        }
    } else 
    {
        $_SESSION['errorSignIn'] = serialize($errorsSignIn);
        header("location:../view/sign-in.php");
    }
}

if(isset($_POST['submit-avatar']))
{
    $user = new User;
    $user = unserialize($_SESSION['signIn']);
    $name = $_FILES['avatar-file']['name'];
    $type = $_FILES['avatar-file']['type'];
    $data = file_get_contents($_FILES['avatar-file']['tmp_name']);

    $userDatabase = new UserDatabase;
    $userDatabase->alterAvatar($user->idUser, $name, $type, $data);
    $userDatabase->checkAvatar($user->idUser);

    $avatar = $userDatabase->checkAvatar($user->idUser);

    $_SESSION['avatar-user'] = serialize($avatar);

    header("location:../view/public-index.php");
}

if(isset($_POST['redefined-password'])) 
{
    if(!Validation::validateEmail($_POST['email']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Email.";  
    }

    if(!Validation::validatePassword($_POST['password']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Senha.";  
    }

    if(sizeof($errors) == 0)
    {
        $user = new User;
        $user->email = Conversion::standardizeEmail(Segurity::XSS($_POST['email']));
        $user->password = Segurity::encrypt($_POST['password']);
        $userDatabase = new UserDatabase;
        $userDatabase->redefinedPassword($user);
        $user = $userDatabase->registerSignInUser($user);

        $_SESSION['signIn'] = serialize($user);
        header("location:../view/public-index.php");
    } else {
        header("location../view/error-screen.html");
    }
}

if(isset($_POST['alter']))
{
    $errors = [];

    if(!Validation::validateName($_POST['name']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Nome."; 
    }

    if(!Validation::validateCPFAlter($_POST['cpf']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo CPF."; 
    }

    if(!Validation::validateEmail($_POST['email']))
    {
        $errors[] = "Ops! Parece que teve um erro no campo Email.";  
    }

    if(!$_POST['password'] == null) 
    {
        if(!Validation::validatePassword($_POST['password']))
        {
            $errors[] = "Ops! Parece que teve um erro no campo Senha.";  
        }
    }
    
    if(sizeof($errors) == 0)
    {
        
        $user = new User;
        $user = unserialize($_SESSION['signIn']);
        $user->idUser;
        $user->userName = Conversion::standardizeName(Segurity::XSS($_POST['name']));
        $user->cpf = Conversion::standardizeCPF(Segurity::XSS($_POST['cpf']));
        $user->email = Conversion::standardizeEmail(Segurity::XSS($_POST['email']));
        if(!$_POST['password'] == null) 
        {
            $user->password = Segurity::encrypt($_POST['password']);
        }

        $userDatabase = new UserDatabase;
        $userDatabase->alterUser($user);

        $_SESSION['signIn'] = serialize($user);
        header("location:../view/public-index.php");
        
    } else {
        header("location../view/error-screen.html");
    }
}

if(isset($_SESSION['signIn']))
{
    $user = new User;
    $user = unserialize($_SESSION['signIn']);
    $userDatabase = new UserDatabase;
    $avatar = $userDatabase->checkAvatar($user->idUser);

    if($avatar['data'] == null) 
    {
        unset($_SESSION['avatar-user']);
    } else 
    {
        $_SESSION['avatar-user'] = serialize($avatar);
        header("location:../view/public-index.php");
    }
}

if(isset($_POST['delete']))
{
    $user = new User;
    $user = unserialize($_SESSION['signIn']);
    $user->idUser;
    $userDatabase = new UserDatabase;
    $user = $userDatabase->deleteUser($user->idUser);

    unset($_SESSION['signIn']);
    header("location:../../index.php");
}

?>