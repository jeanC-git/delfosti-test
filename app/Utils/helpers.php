<?php


function removeStrangeCharacters($string): string
{
    return preg_replace('/[^(\x20-\x7F)\x0A\x0D]*/', '', $string);
}
