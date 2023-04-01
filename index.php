<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/Logo.png">
    <title>GambleOn</title>
</head>

<body>
    <div class="bgrad"></div>
    <header><span id="title">GambleOn!</span>
        <span id="substr">World's most fair gambling site!</span>
    </header>
    <main>
        <form action="play.php" method="POST" autocomplete="off">
            <div class="box">
                <div class="players">
                    <!--"row"-->
                    <div class="col">
                        <div class="play">
                            <p class="playText">FIRST<br />PLAYER</p><br />
                            <input style="text-transform:uppercase" type="text" name="p1" class="name" maxlength="10" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="play">
                            <p class="playText">SECOND<br />PLAYER</p><br />
                            <input style="text-transform:uppercase" type="text" name="p2" class="name" maxlength="10" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="play">
                            <p class="playText">THIRD<br />PLAYER</p><br />
                            <input style="text-transform:uppercase" type="text" name="p3" class="name" maxlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="players">
                    <!--"row"-->
                    <div class="col">
                        <div class="play playSelect">
                            <p class="playText">NO. OF DICES</p><br />
                            <select name="dices" id="selectDices">
                                <option>1</option>
                                <option>2</option>
                                <option selected>3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col colEmp">
                    </div>

                    <div class="col">
                        <div class="play playSelect">
                            <p class="playText">NO. OF TURNS</p><br />
                            <select name="rounds" id="selectTurn">
                                <option>1</option>
                                <option>2</option>
                                <option selected>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    
                </div>
                
                
                <div class="col btnCol">
                        <div class="play btnPlay">
                            <input type="submit" class="subm" name="subm" value="GAMBLE ON!">
                        </div>
                    </div>



            </div>
        </form>

    </main>
<?php
 if (isset($_POST['subm'])){
    $_SESSION['u1']=$_POST['p1'];
    $_SESSION['u2']=$_POST['p2'];
    $_SESSION['u3']=$_POST['p3'];
    print_r($_SESSION);
 }
?>

</body>

</html>