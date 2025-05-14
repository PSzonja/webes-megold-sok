<!DOCTYPE html>
<html lang="hu">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>JS/PHP beadandó</title>
    <link type="text/css" rel="stylesheet" href="base.css">
</head>
<body>
    <div id="container">
        <h2 id="title">Jelszó ellenőrző</h2>
        <form action="" id="form_container" name="passform" method="POST">
            <ul id="form_list">
                <li>
                    <label for="em">E-mail:</label>
                    <input id="em" type="email" name="email">
                </li>
                <li>
                    <label for="pw">Jelszó:</label>
                    <input id="pw" type="password" name="password">
                </li>
                <li>
                    <input id="send_button" type="submit" name="send" value="Ellenorzes">
                </li>
            </ul>
        </form>
        <div id="result_container" >
            <?php
                $offsets = array(5, -14, 31, -9, 3); // [5,-14,31,-9,3] tömb
                $pointer = 0; // 0 mutató
                $decrypted = ""; // titkosítatlan jelszó

                $file = fopen("password.txt", "r") or die("Unable to open file!"); // beolvassa jelszó fájlt
                $encrypted = fread($file,filesize("password.txt")); //titkosított jelszavak variable
                fclose($file); // bezárja a fájlt

                $enc_array = str_split($encrypted); //Ha jól értem, pl. szuper; asdasdasdas , akkor az első-t fogja választani
                foreach ($enc_array as $char) { // s -> z -> u -> p -> e -> r (karaktereként olvassa)
                    $code = ord($char); // lekérjük ansii kódtáblát
                    if ($code == 10) { //Sortörés??
                        $decrypted .= $char; //asszem ez " " . "\n"  (pl. $wut = 1; $wut .= asd ugyanaz mint $wut = 1 . asd = 1asd lesz) (konkatenáció)
                        $pointer = 0; //0
                        continue; // vége a karakternek, átadja kövi karakternek
                    }
                    $decrypted .= chr($code - $offsets[$pointer]); // szám helyett jelszó lesz chr(11-5) (visszafejt a kódot) (pointer =0)
                    if ($pointer == count($offsets) - 1) { // ha 1 == 1, akkor pointer 0 lesz
                        $pointer = 0;
                    } else { // ha nem egyenlő pl. 0 != 5 
                        $pointer += 1; //pointer = 1 lesz
                    }
                }

                $tmp_arr = explode(chr(10), $decrypted); // szétválasztja titkosítatlan jelszót, pl [0] -> "fasza vagyok", [1] "i dont know" 

                $users = array();
                $usersrev = array(); // Üres tömb

                foreach ($tmp_arr as $user) { // végig olvassa a tömböt
                    //$user(explode);
                    $usersrev = explode('*', $user);
                    //$usersrev[1](explode);
                    $users = array_reverse($usersrev);
                    //$users[1](explode); // ha jól értem, külön választja a felhasználót és jelszót, mivel a felhasználó lesz második , ezért berakja [0] helyére
                }

                if (isset($_POST['email']) && isset($_POST['password'])) {//Változást észlel, megnyomta valaki a gombot
                    if (!array_key_exists($_POST['email'], $users)) { //Gondolom ezeket érted xd
                        print '<script type="text/javascript">alert("Nincs ilyen felhasználó!");</script>';
                    }
                    else if ($users[$_POST['email']] != $_POST['password']) {
                        print '<script type="text/javascript">alert("Hibás jelszó!"); setTimeout(function(){
                            window.location.href = "http://www.police.hu/";
                         }, 3000);</script>';
                    } 
                    else {
                        $_SESSION['user_to_check'] = $_POST['email']; //Ha minden okés 
                        include 'db_getcolor.php';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>