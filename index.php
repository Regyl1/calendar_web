<?php
    echo "<link rel='stylesheet' href='style.css'>";
    echo "<script src=\"script.js\"></script>";
    $month = date('n');
    $year = date('Y');

    $months = array(
        1  => 'Январь',
        2  => 'Февраль',
        3  => 'Март',
        4  => 'Апрель',
        5  => 'Май',
        6  => 'Июнь',
        7  => 'Июль',
        8  => 'Август',
        9  => 'Сентябрь',
        10 => 'Октябрь',
        11 => 'Ноябрь',
        12 => 'Декабрь'
    );
    echo '
    <div class="calendar-item">
        <div class="calendar-head">' . $months[$month] . '</div>
        <table>
            <tr>
                <th>пн</th>
                <th>вт</th>
                <th>ср</th>
                <th>чт</th>
                <th>пт</th>
                <th>сб</th>
                <th>вс</th>
            </tr>
            <tr>';

    $first_day = date('N', mktime(0, 0, 0, $month, 1, $year));
    {
        $days_in_prev_month = date('t', mktime(0, 0, 0, $month - 1, 1, $year));
        for ($i = 1; $i < $first_day; $i++){
            $day = $days_in_prev_month - $first_day + $i + 1;
            echo '<td class="calendar-another-month" onclick="changeColor(this)" id=' . 
                date("d-m-Y", mktime(0, 0, 0, $month - 1, $day, $year)) . 
                '>' . $day . '</td>';
        }
    }

    $day_of_week = $first_day;
    $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

    for ($current_date = 1; $current_date <= $days_in_month; $current_date++){
        echo '<td onclick="changeColor(this)" id=' . 
        date("d-m-Y", mktime(0, 0, 0, $month, $current_date, $year)) . 
        '>' . $current_date . '</td>';
        $day_of_week++;
        if ($day_of_week == 8){
            $day_of_week = 1;
            echo '</tr><tr>';
        }
    }

    {
        $current_date = 1;
        while ($day_of_week <= 7){
            echo '<td class="calendar-another-month" onclick="changeColor(this)" id=' . 
            date("d-m-Y", mktime(0, 0, 0, $month + 1, $current_date, $year)) . 
            '>' . $current_date . '</td>';
            $current_date++;
            $day_of_week++;
        }
    }
    echo '</tr></table></div>';
?>