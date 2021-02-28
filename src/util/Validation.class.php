<?php
//Desenvolvido por Guilherme Spica Luiz
class Validation
{
    public static function validateName($value)
    {
        $expression = "/^.{2,60}$/";
        return preg_match($expression, $value);
    }

    public static function validateCPF($value)
    {
        $expression = "/^[0-9.-]{14}$/";
        return preg_match($expression, $value);
    }

    public static function validateCPFAlter($value)
    {
        $expression = "/^[0-9.-]{11}$/";
        return preg_match($expression, $value);
    }

    public static function validateEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function validatePassword($value)
    {
        $expression = "/^.{8,15}$/";
        return preg_match($expression, $value);
    }
}
?>