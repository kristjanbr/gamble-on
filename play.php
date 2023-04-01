<?php
session_start();
$met1 = 0;
$met2 = 0;
$met3 = 0;
if (isset($_POST['subm'])) {
    $_SESSION['p1'] = strtoupper($_POST['p1']);
    $_SESSION['p2'] = strtoupper($_POST['p2']);
    $_SESSION['p3'] = strtoupper($_POST['p3']);
    $_SESSION['dices'] = $_POST['dices'];
    $_SESSION['rounds'] = $_POST['rounds'];
    $_SESSION['metIg1'] = 0;
    $_SESSION['metIg2'] = 0;
    $_SESSION['metIg3'] = 0;
    $_SESSION['remr'] = 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/igra.css">
    <link rel="icon" href="img/Logo.png">
    <title>GambleOn</title>
</head>

<body>

    <div class="bgrad"></div>
    <header><span id="title">GambleOn!</span>
        <span id="substr">World's most fair gambling site!</span>
    </header>
    <main>
        <div class="box">

            <div class="playersWrap">
                <div class="colIgra">
                    <div class="playersIgra" id="ig1">
                        <?php
                        $rounds = $_SESSION['dices'];
                        $thisround = 0;
                        for ($i = 0; $i < $rounds; $i++) {
                            $rnd = rand(1, 6);
                            $thisround = $thisround + $rnd;
                            echo "<img class=\"cubeLoc1\" src=\"img/dice{$rnd}.gif\"/><br/>";
                        }
                        echo "<b>USER:<br>";
                        echo $_SESSION['p1'];
                        echo "<br><br></b>";
                        echo "<b>CURRENT POINTS: <span id=\"pont1\">" . ($thisround + $_SESSION['metIg1']) . "</span></b>";
                        $_SESSION['metIg1'] = $thisround + $_SESSION['metIg1'];

                        ?>
                    </div>
                </div>


                <div class="colIgra">
                    <div class="playersIgra" id="ig2">
                        <?php
                        $rounds = $_SESSION['dices'];
                        $thisround = 0;
                        for ($i = 0; $i < $rounds; $i++) {
                            $rnd = rand(1, 6);
                            $thisround = $thisround + $rnd;
                            echo "<img class=\"cubeLoc2\" src=\"img/dice{$rnd}.gif\"/><br/>";
                        }
                        echo "<b>USER:<br>";
                        echo $_SESSION['p2'];
                        echo "<br><br></b>";
                        echo "<b>CURRENT POINTS: <span id=\"pont2\">" . ($thisround + $_SESSION['metIg2']) . "<span/></b>";
                        $_SESSION['metIg2'] = $thisround + $_SESSION['metIg2'];

                        ?>
                    </div>
                </div>


                <div class="colIgra">
                    <div class="playersIgra" id="ig3">
                        <?php
                        $rounds = $_SESSION['dices'];
                        $thisround = 0;
                        for ($i = 0; $i < $rounds; $i++) {
                            $rnd = rand(1, 6);
                            $thisround = $thisround + $rnd;
                            echo "<img class=\"cubeLoc3\" src=\"img/dice{$rnd}.gif\"/><br/>";
                        }
                        echo "<b>USER:<br>";
                        echo $_SESSION['p3'];
                        echo "<br><br></b>";
                        echo "<b>CURRENT POINTS: <span id=\"pont3\">" . ($thisround + $_SESSION['metIg3']) . "<span/></b>";
                        $_SESSION['metIg3'] = $thisround + $_SESSION['metIg3'];

                        ?>
                    </div>
                </div>

            </div>
            <br />
            <div class="submWrap">

                <?php
                
                if ($_SESSION['remr'] >= $_SESSION['rounds']) {
                    echo "<input type=\"submit\" id=\"submBut\" value=\"FINISH\" onclick=\"finish()\">";
                } else {
                    echo "<input type=\"submit\" id=\"submBut\"  value=\"NEXT ROUND(" . $_SESSION['remr'] . "/" . $_SESSION['rounds'] . ")\" onclick=\"reload()\">";
                }
                $_SESSION['remr'] = $_SESSION['remr'] + 1;
                ?>
                <script>
                    function reload() {
                        location.href = 'play.php';
                    }

                    function finish() {
                        location.href = 'finish.php';
                    }
                </script>

            </div>




        </div>
    </main>
    <script>
        document.getElementById("submBut").disabled = true;
        var list = [
            document.getElementsByClassName("cubeLoc1"),
            document.getElementsByClassName("cubeLoc2"),
            document.getElementsByClassName("cubeLoc3")
        ];

        var temp = [
            list[0][0].src,
            list[1][0].src,
            list[2][0].src
        ];

        var pont = [
            document.getElementById("pont1").innerHTML,
            document.getElementById("pont2").innerHTML,
            document.getElementById("pont3").innerHTML
        ];

        document.getElementById("pont1").innerHTML = "??";
        document.getElementById("pont2").innerHTML = "??";
        document.getElementById("pont3").innerHTML = "??";


        for (var i = 0; i < list.length; i++) {
            list[i][0].src = "img/dicespin.gif"
        }

        for (var i = 0; i < list.length; i++) {
            for (var j = 1; j < list[i].length; j++) {
                list[i][j].setAttribute("hidden", "hidden");
            }
        }
        setTimeout(() => {

            for (var i = 0; i < list.length; i++) {
                for (var j = 1; j < list[i].length; j++) {
                    list[i][j].removeAttribute("hidden");
                }
            }
            for (var i = 0; i < list.length; i++) {
                list[i][0].src = temp[i];
            }
            document.getElementById("pont1").innerHTML = pont[0];
            document.getElementById("pont2").innerHTML = pont[1];
            document.getElementById("pont3").innerHTML = pont[2];
            document.getElementById("submBut").disabled = false;
        }, 2000)
    </script>
</body>

</html>