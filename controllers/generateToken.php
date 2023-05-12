<?php

function token_random_string($leng = 7)
{
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = '';
    for ($i = 0; $i < $leng; $i++) {
        $token .= $str[rand(0, strlen($str) - 1)];
    }
    return $token;
}