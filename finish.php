<?php
session_start();
session_destroy();

$a = array(
    $_SESSION['metIg1'],
    $_SESSION['metIg2'],
    $_SESSION['metIg3']
);
$pl = array(
    $_SESSION['p1'],
    $_SESSION['p2'],
    $_SESSION['p3']
);

$i;
$j;
$x;
$xpl;
$a;
for ($i = 1; $i < sizeof($a); $i++) {
    if ($a[$i] < $a[$i - 1])
        continue;
    $x = $a[$i];
    $xpl = $pl[$i];
    $j = $i - 1;
    while ($j >= 0 && $x > ($a[$j])) {
        $a[$j + 1] = $a[$j];
        $pl[$j + 1] = $pl[$j];
        $j = $j - 1;
    }
    $a[$j + 1] = $x;
    $pl[$j + 1] = $xpl;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/finish.css">
    <link rel="icon" href="img/Logo.png">
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@latest/dist/fireworks.js"></script>
    <title>GambleOn</title>
</head>

<body>

    <div class="bgrad" id="bgr"></div>
    <header><span id="title">GambleOn!</span>
        <span id="substr">World's most fair gambling site!</span>
    </header>
    <main>
        <div class="box">
            <div class="players">
                <!--"row"-->
                <div class="col" id="c1">
                    <!--2.mesto-->
                    <span class="place"><?php
                                        echo $pl[1] . "(" . $a[1] . ")";
                                        ?></span>
                    <div class="play" id="p1">2
                    </div>
                </div>

                <div class="col" id="c2">
                    <!--1.mesto-->
                    <span class="place"><?php
                                        echo $pl[0] . "(" . $a[0] . ")";
                                        ?></span>
                    <div class="play" id="p2">1
                    </div>
                </div>

                <div class="col" id="c3">
                    <!--3.mesto-->
                    <span class="place"><?php
                                        echo $pl[2] . "(" . $a[2] . ")";
                                        ?></span>
                    <div class="play" id="p3">3
                    </div>
                </div>
            </div>
            <br/>
            <span id="timeout"></span>


        </div>

    </main>
    <script>
        tmout = document.getElementById("timeout")
        i = 10;
        cout()

        function cout() {
            if (i > -1) {
                tmout.innerHTML = "Redirecting in " + i + " seconds..."
            } else {
                location.href = 'index.php';
                return
            }
            i--;
            setTimeout("cout()", 1000);
        }
    </script>

</body>

</html>