<?php


// Registration code generator.
if (!function_exists('GetSerials')) {
    function salt($length = 22)
    {
        return substr(sha1(mt_rand()), 0, $length);
    }
    function GetSerials()
    {
        $char = '0123456789';
        $hash = md5($char . salt());

        for ($i = 0; $i < 1000; $i++) {
            $hash = md5($hash);
        }

        return implode('-', str_split(substr(strtoupper($hash), 0, 20), 5));
    }
}

// Emulate Username generator.
if (!function_exists('EmuUserName')) {
    function EmuUserName($langth = 5)
    {
        $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($char);
        $randomString = '';

        for ($i = 0; $i < $langth; $i++) {
            $randomString .= $char[rand(0, $charLength - 1)];
        }

        return "SDL-" . $randomString;
    }
}
