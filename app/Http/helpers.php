<?php

function user($p)
{
    return auth()->user() ? auth()->user()->$p : null;
}

function rn()
{
    return request()->route()->getName();
}

function short($string, $n=100)
{
    return strlen($string) > $n ? mb_substr($string, 0, $n).'...' : $string;
}

function master()
{
    $user = auth()->user();
    return $user->type == 'master';
}
