<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Time</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="clock.js"></script>
</head>
<body onload="counting();">
<a href="index.php">Zabawa czasem :)</a>
<div id="clock">
    <h2>12:00:00</h2>
</div>
<hr/>
<div>
    <?php
    $day = date('d');
    $dayOfWeek = date('l');
    $month = date('n');
    $year = date('Y');
    $week = ['Monday' => 'Poniedziałek', 'Tuesday' => 'Wtorek', 'Wednesday' => 'Środa', 'Thursday' => 'Czwartek', 'Friday' => 'Piątek', 'Saturday' => 'Sobota', 'Sunday' => 'Niedziela'];
    $months = [1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];

    echo "Dziś mamy: <br/>";
    echo "<span style='color: blue'>" . $week[$dayOfWeek] . ", " . $day . " " . $months[$month] . " " . $year . "r.</span><hr/>";

    $present = new DateTime();

    $past = new DateTime();
    $past->setDate(1982, 10, 8);
    $diff = $present->diff($past);
    echo "<span style='color: yellow'>Urodziłem się dokładnie " . $diff->format("%y lat, %m miesiecy i %d dni temu") . "</span><br/>";

    $future = new DateTime();
    $future->setDate(2018, 10, 8);
    $diff = $present->diff($future);
    echo "<span style='color: green'>36 urodziny będe miał za " . $diff->format("%y lat, %m miesiecy i %d dni") . "</span><br/>";

    $future = new DateTime();
    $future->setDate(2022, 10, 8);
    $diff = $present->diff($future);
    echo "<span style='color: green'>40 urodziny będe miał za " . $diff->format("%y lat, %m miesiecy i %d dni") . "</span><br/>";

    $future = new DateTime();
    $future->setDate(2032, 10, 8);
    $diff = $present->diff($future);
    echo "<span style='color: green'>50 urodziny będe miał za " . $diff->format("%y lat, %m miesiecy i %d dni") . "</span>";

    ?>
</div>
<hr/>
<div>
    <form method="POST">
        Wybierz swoją datę: <br/>
        <input type="date" name="day"/> <br/>
        <input type="submit" value="Sprawdź"/>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['day'])) {
            $day = $_POST['day'];
            $split = explode("-", $day);
            $value1 = $split[0];
            $value2 = $split[1];
            $value3 = $split[2];
//            date_default_timezone_set('Europe/Moscow');
//            $zone = date_default_timezone_get();
//            var_dump($zone);


            $present = new DateTime();
            $past = new DateTime();
            $past->setDate($value1, $value2, $value3);
            $diff = $present->diff($past);
            if ($past < $present) {
                echo "<span style='color: orange'>Data " . $past->format('d-m-Y') . " miała miejsce: " . $diff->format("%y lat, %m miesiecy i %d dni temu") . "</span>";
            } else if ($past == $present) {
                echo "<span style='color: blue'>Wybrałeś dzień dzisiejszy :)</span>";
            } else {
                echo "<span style='color: red'>Data " . $past->format('d-m-Y') . " będzie miała miejsce za " . $diff->format("%y lat, %m miesiecy i %d dni") . "</span>";
            }
        }
    }
    ?>
    <hr/>
    <form method="post">
        Wybierz historyczną datę: <br/>
        <select name="date">
            <option value="966">"Chrzest Polski" - 966r.</option>
            <option value="1410">"Bitwa pod Grunwaldem" - 1410r.</option>
            <option value="1525">"Hołd Pruski" - 1525r.</option>
            <option value="1683">"Odsiecz wiedeńska" - 1683r.</option>
            <option value="1772">"I rozbiór Polski" - 1772r.</option>
            <option value="1791">"Uchwalenie Konstytucji 3 maja" - 1791r.</option>
            <option value="1793">"II Rozbiór Polski" - 1793r.</option>
            <option value="1830">"Powstanie Listpadowe" - 1830r.</option>
            <option value="1863">"Powstanie Styczniowe" - 1863r.</option>
            <option value="1914">"Wybuch I wojny światowej" - 1914r.</option>
            <option value="1918">"Odzyskanie niepodległości" - 1918r.</option>
            <option value="1939">"Wybuch II wojny światowej" - 1939r.</option>
            <option value="1989">"Koniec rządów komunistycznych - 1989r.</option>
        </select><br/>
        <input type="submit" value="Sprawdź"/>
    </form>
    <?php
    //echo date_default_timezone_get();
    //echo "<h3>Zacznijmy od tego :)</h3>";
    //echo "Taką i taką mamy  godzinę: ".date('H:i:s')."<br/>";
    //echo "Taka i taką mam datę: " .date('d.m.Y')."<br/>";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['date'])) {
            $date = $_POST['date'];
            $today = new DateTime();

            switch ($date) {
                case "966";
                    $d966 = new DateTime();
                    $d966->setDate(966, 01, 01);
                    $interval = $today->diff($d966);
                    echo "<span style='color: gold'>Chrzest Polski - 966r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1410";
                    $d1410 = new DateTime();
                    $d1410->setDate(1410, 07, 15);
                    $interval = $today->diff($d1410);
                    echo "<span style='color: red'>Bitwa pod Grunwaldem - 15 lipca 1410r. miała miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1525";
                    $d1525 = new DateTime();
                    $d1525->setDate(1525, 04, 10);
                    $interval = $today->diff($d1525);
                    echo "<span style='color: yellow'>Hołd pruski - 10 kwietnia 1525r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1683";
                    $d1683 = new DateTime();
                    $d1683->setDate(1683, 9, 12);
                    $interval = $today->diff($d1683);
                    echo "<span style='color: blue'>Odsiecz wiedeńska - 12 września 1683r. miała miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1772";
                    $d1772 = new DateTime();
                    $d1772->setDate(1772, 01, 01);
                    $interval = $today->diff($d1772);
                    echo "<span style='color: green'>I rozbiór Polski - 1772r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1791";
                    $d1791 = new DateTime();
                    $d1791->setDate(1791, 05, 03);
                    $interval = $today->diff($d1791);
                    echo "<span style='color: orange'>Uchwalenie konstytucji 3 maja - 3 maja 1791r. miało miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1793";
                    $d1793 = new DateTime();
                    $d1793->setDate(1793, 01, 01);
                    $interval = $today->diff($d1793);
                    echo "<span style='color: white'>II rozbiór Polski - 1793r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1830";
                    $d1830 = new DateTime();
                    $d1830->setDate(1830, 11, 29);
                    $interval = $today->diff($d1830);
                    echo "<span style='color: brown'>Wybuch Pwstania Listopadowego - 29 listopada 1830r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1863";
                    $d1863 = new DateTime();
                    $d1863->setDate(1863, 01, 22);
                    $interval = $today->diff($d1863);
                    echo "<span style='color: red'>Wybuch Pwstania Styczniowego - 22 stycznia 1863r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1914";
                    $d1914 = new DateTime();
                    $d1914->setDate(1914, 07, 28);
                    $interval = $today->diff($d1914);
                    echo "<span style='color: yellow'>Wybuch I wojny światowej - 28 lipca 1914r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1918";
                    $d1918 = new DateTime();
                    $d1918->setDate(1918, 11, 11);
                    $interval = $today->diff($d1918);
                    echo "<span style='color: blue'>Odzyskanie niepodległości przez Polskę i koniec I wojny światowej - 11 listopada 1918r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1939";
                    $d1939 = new DateTime();
                    $d1939->setDate(1939, 9, 01);
                    $interval = $today->diff($d1939);
                    echo "<span style='color: orange'>Wybuch II wojny światowej - 1 września 1939r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
                case "1989";
                    $d1989 = new DateTime();
                    $d1989->setDate(1989, 06, 04);
                    $interval = $today->diff($d1989);
                    echo "<span style='color: white'>Koniec rządów komunistycznych - 4 czerwca 1989r. miał miejsce: " . $interval->format("%Y lat %m miesiecy %d dni temu") . "</span>";
                    break;
            }
        }
    }
    //    $timezone = new DateTimeZone("Europe/London");
    //    $transitions = $timezone->getTransitions();
    //    print_r(array_slice($transitions, 0, -5));
    ?>
</div>
</body>
</html>