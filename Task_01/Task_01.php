<?php
require 'Task_01_Functions.php';

$style = "";
$error = "";

if (IsValuesSet()) {
    $red = GetValue($_POST["Red"]);
    $green = GetValue($_POST["Green"]);
    $blue = GetValue($_POST["Blue"]);

    if (IsIncorrect($red) || IsIncorrect($green) || IsIncorrect($blue))
        $error = "All inputs have to be filled with digits from 0 to 255!";
    else
        $style = RenderStyle($red, $green, $blue);
}
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="Task_01_Styles.css">
</head>

<body>
<h1>Please fill the form with digits from 0 to 255</h1>
<p>Non-digit input returns always 0</p>

<!--ERROR PRINTER-->
<div>
    <h3><?= $error ?></h3>
</div>

<!--MAIN FORM-->
<div>
    <form action="" method="post" autocomplete="off">
        <div>
            <label>RED</label>
            <br>
            <input type="text" name="Red">
        </div>
        <br>

        <div>
            <label>GREEN</label>
            <br>
            <input type="text" name="Green">
        </div>
        <br>

        <div>
            <label>BLUE</label>
            <br>
            <input type="text" name="Blue">
        </div>
        <br>

        <button type="submit">Accept</button>
    </form>
</div>

<br>
<br>

<!--AFFECTING SPAN-->
<div>
    <span <?= $style ?>>This span will be affected by your input.</span>
</div>


<body>
<html>
