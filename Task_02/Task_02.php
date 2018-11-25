<?php
require 'Task_02_Functions.php';
$calendar = GetCalendar(5);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="Task_02_Styles.css">
</head>
<body>

<h1><?= $calendar['name']?></h1>

<table>
    <thead>
    <th>ПН</th>
    <th>ВТ</th>
    <th>СР</th>
    <th>ЧТ</th>
    <th>ПТ</th>
    <th class="weekend">СБ</th>
    <th class="weekend">ВС</th>
    </thead>

    <tbody>
    <?= $calendar['render'] ?>
    </tbody>
</table>


</body>
</html>

