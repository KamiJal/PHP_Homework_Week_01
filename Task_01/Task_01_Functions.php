<?php
function IsValuesSet()
{
    return isset($_POST["Red"]) || isset($_POST["Green"]) || isset($_POST["Blue"]);
}

function GetValue($data)
{
    return is_numeric($data) ? intval($data) : -1;
}

function IsIncorrect($data)
{
    return $data === null || $data < 0 || $data > 255;
}

function Foreground($background)
{
    return ($background > 100 && $background < 151) ? 255 : 255 - $background;
}

function RenderStyle($red, $green, $blue)
{
    $format = "style=\"background:rgb(%d, %d, %d);color:rgb(%d, %d, %d);\"";
    return sprintf($format, $red, $green, $blue, Foreground($red), Foreground($green), Foreground($blue));
}