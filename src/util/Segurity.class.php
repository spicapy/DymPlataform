<?php
//Desenvolvido por Guilherme Spica Luiz
class Segurity
{
    public static function XSS($value)
    {
        return htmlentities($value);
    }

    public static function encrypt($value)
    {
        return password_hash($value, PASSWORD_DEFAULT);
    }
}
?>