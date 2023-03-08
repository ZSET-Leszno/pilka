<?php

$name = $_POST['name'];
$secondname = $_POST['secondname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

if(!empty($name) && !empty($secondname) && !empty($email) && !empty($phone) && !empty($address)) {
    $host = "localhost";
    $user = "zset_witkiewicz";
    $password = "Witkiewicz_123";
    $dbname = "zset_witkiewicz";
    $conn = mysqli_connect($host, $user, $password, $dbname);
    if (!$conn) {
        die("Błąd: " . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO `customers` (`imie`, `nazwisko`, `email`, `numer_telefonu`, `adres`) VALUES ('$name', '$secondname', '$email', '$phone', '$address')";
        if (mysqli_query($conn, $sql)) {
            echo "Dodano pomyślnie dane";
            return header('Location: /witkiewicz/wypozyczalniaaut/');
        } else {
            echo "Bląd: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
} else {
    die('Brak wszystkich danych');
}