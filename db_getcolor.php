<?php
    $source = 'password.txt'; // fill
    $user = 'Username'; // fill
    $password = 'Titkos'; // fill
    $database = 'adatok'; // fill
    $color = '';
    $back = '';

    $user_to_check = $_SESSION['user_to_check']; //Session 

    $conn = new mysqli($source, $user, $password, $database); //source helyére host kell írnod, ez így sose lesz jó
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); //adatbázis sikertelen kapcsolódás
    }

    $sql = "SELECT Titkos FROM tabla WHERE Username='".$user_to_check."';"; // megnézi a felhasználó nevét adatbázisból
    $result = $conn->query($sql); //lekérést hozzáadtunk

    if ($result->num_rows > 0) { //Végig olvassa a lekérést, ha csak nem 0
        while($row = $result->fetch_assoc()) { //feldolgozza a lekérést
            $color = $row['Titkos']; //ez már adatbázis része, megkapja az adott színt
        }
    } else {
        $color = 'error';  //hiba
    }

    $conn->close(); //adatbázis lekapcsolódása

    switch ($color) { //kapott érték, hacsak nem error (módosítja js-el html-et)
        case 'piros':
            $back = '<script type="text/javascript">document.body.style.background="red"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        case 'zold':
            $back = '<script type="text/javascript">document.body.style.background="green"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        case 'sarga':
            $back = '<script type="text/javascript">document.body.style.background="yellow"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        case 'kek':
            $back = '<script type="text/javascript">document.body.style.background="blue"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        case 'fekete':
            $back = '<script type="text/javascript">document.body.style.background="black"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        case 'feher':
            $back = '<script type="text/javascript">document.body.style.background="white"; alert("'.$user_to_check.' kedvenc színe: '.$color.'.");</script>';
            break;
        default:
            $back = '<script type="text/javascript">alert("'.$user_to_check.' felhasználóhoz nincs tárolva kedvenc szín!");</script>';
            break;
    }

    print $back;
?>