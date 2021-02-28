<?php
//Desenvolvido por Guilherme Spica Luiz
class User 
{
    private $idUser;
    private $userName;
    private $cpf;
    private $email;
    private $password;

    public function __get($attributes)
    {
        return $this->$attributes;
    }

    public function __set($attributes, $value)
    {
        $this->$attributes = $value;
    }

    public function __toString()
    {
        return nl2br("ID: $this->idUser
                    Nome: $this->userName
                    CPF: $this->cpf
                    E-mail: $this->email
                    Senha: $this->password");
    }
}
?>