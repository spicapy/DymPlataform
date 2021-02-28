<?php
//Desenvolvido por Lucas Vieira
require_once "ConnectionDB.class.php";

class UserDatabase
{
    private $connection = null;

    public function __construct()
    {
        $this->connection = ConnectionBD::getInstance();
    }

    public function registerUser($user)
    {
        try {
            $statement = $this->connection->prepare("insert into user(idUser,userName,email,cpf,password)values(null,?,?,?,?)");
            $statement->bindValue(1,$user->userName);
            $statement->bindValue(2,$user->email);
            $statement->bindValue(3,$user->cpf);
            $statement->bindValue(4,$user->password);
            $statement->execute();
            
        }catch(PDOException $error) {
            echo "!Problema ao Cadastrar no Banco!".$error;
        }
    }

    public function registerSignInUser($user)
    {
        try {
            $statement = $this->connection->prepare("select * from user where email = ? and password = ?");
            $statement->bindValue(1,$user->email);
            $statement->bindValue(2,$user->password);
            $statement->execute();
            
            $returnUser = null;
            $returnUser = $statement->fetchObject('User');
            return $returnUser;
        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function signInUser($user)
    {
        try {
            $statement = $this->connection->prepare("select * from user where email = ?");
            $statement->bindValue(1,$user->email);
            $statement->execute();

            $returnUser = $statement->fetchObject('User');

            if($returnUser == null) 
            {
                return $returnUser = null;
            } else {
                $verifyPassword = password_verify($user->password, $returnUser->password);
                if($verifyPassword == 1)
                {
                    return $returnUser;
                } else 
                {
                    return $returnUser = null;
                }
            }
        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function alterAvatar($id, $name, $type, $data)
    {
        try {
            $statement = $this->connection->prepare("update user set avatar = ?, type = ?, data = ? where idUser = ?");
            $statement->bindValue(1,$name);
            $statement->bindValue(2,$type);
            $statement->bindValue(3,$data);
            $statement->bindValue(4,$id);
            $statement->execute();

        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function checkAvatar($id)
    {
        try {
            $query = "where idUser =".$id;
            $statement = $this->connection->query("select * from user {$query}");
            return $statement->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function alterUser($user)
    {
        try {
            $statement = $this->connection->prepare("update user set userName = ?, email = ?, cpf = ?, password = ? where idUser = ?");
            $statement->bindValue(1,$user->userName);
            $statement->bindValue(2,$user->email);
            $statement->bindValue(3,$user->cpf);
            $statement->bindValue(4,$user->password);
            $statement->bindValue(5,$user->idUser);
            $statement->execute();

        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function redefinedPassword($user)
    {
        try {
            $statement = $this->connection->prepare("update user set password = ? where email = ?");
            $statement->bindValue(1,$user->password);
            $statement->bindValue(2,$user->email);
            $statement->execute();

        }catch(PDOException $error) {
            echo "!Problema ao Logar no Banco!".$error;
        }
    }

    public function deleteUser($id)
    {
        try {
            $statement = $this->connection->prepare("delete from user where iduser = ?");
            $statement->bindValue(1,$id);
            $statement->execute();
        }catch(PDOException $error) {
            echo "!Problema ao Deletar Usuário no Banco!".$error;
        }
    }
}
?>
