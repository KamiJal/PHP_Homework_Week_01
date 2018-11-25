<?php
//MAIN METHOD
function GetCalendar($month)
{
    $month = intval($month);

    if ($month < 1 || $month > 12)
        exit("<h1 style=\"color: red\">Invalid month</h1>");

    $currentYear = intval(date('Y'));
    $daysInMonth = GetDaysInSpecificMonth($month, $currentYear);
    $startDayOfWeek = GetMonthStartDayOfWeek($month, $currentYear);

    return ['name' => RenderMonthInfo($month, $currentYear), 'render' => RenderTableInfo($daysInMonth, $startDayOfWeek)];
}

//HELPERS
function RenderMonthInfo($month, $year)
{
    $rusMonthNames = [1 => "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
        "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

    return sprintf("%s %d", $rusMonthNames[$month], $year);
}

function RenderTableInfo($daysInMonth, $startDayOfWeek)
{
    $result = "";

    for ($currentDay = 1, $countStarted = false; $currentDay <= $daysInMonth;) {

        $result .= "<tr>";

        for ($dayOfWeek = 1; $dayOfWeek <= 7; ++$dayOfWeek) {

            $result .= ($dayOfWeek > 5) ? "<td class='weekend'>" : "<td>";

            if ($dayOfWeek === $startDayOfWeek)
                $countStarted = true;

            if ($countStarted && $currentDay <= $daysInMonth)
                $result .= $currentDay++;

            $result .= "</td>";
        }

        $result .= "</tr>";
    }

    return $result;
}

function GetMonthStartDayOfWeek($month, $year)
{
    $dayOfWeek = intval(date('w', GetSpecificDatetime(1, $month, $year)->getTimestamp()));
    return $dayOfWeek === 0 ? 7 : $dayOfWeek;
}

function GetDaysInSpecificMonth($month, $year)
{
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function GetSpecificDatetime($day, $month, $year)
{
    return new DateTime(sprintf("%d/%d/%d", $month, $day, $year));
}



