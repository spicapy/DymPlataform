<?php
//Desenvolvido por Guilherme Spica Luiz
class Conversion
{
    public static function standardizeName($value)
    {
        return ucwords(mb_strtolower($value));
    }

    public static function standardizeCPF($value)
    {
        $value = str_replace(".", "", $value);
        $value = str_replace("-", "", $value);
        return $value;
    }

    public static function standardizeEmail($value)
    {
        return mb_strtolower($value);
    }
}
?>