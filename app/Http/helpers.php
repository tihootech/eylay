<?php

function user($p)
{
    return auth()->user() ? auth()->user()->$p : null;
}

function short($string, $n=100)
{
    return strlen($string) > $n ? mb_substr($string, 0, $n).'...' : $string;
}
