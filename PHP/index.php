<?php
// Spajanje na bazu
require "db.php";

// Pokretanje sesije
session_start();

$_SESSION['ime'] = 'robert';

var_dump($_SESSION);
//print_r($_SERVER);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["first_name"]) && isset($_POST["last_name"])) {
        $ime = $_POST["first_name"];
        $prezime = $_POST["last_name"];
        $lozinka = $_POST["password"];

        $hashirana_lozinka = password_hash($lozinka, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (first_name, last_name, password) values ('$ime', '$prezime', '$hashirana_lozinka')";
        //var_dump($insert_query);
        $result = $mysqli->query($insert_query);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET["id"];
    $lozinka = $_GET["password"];

    $get_query = "SELECT * from users where id = '$id'";

    $result = $mysqli->query($get_query);

    $user = $result->fetch_assoc();

    if (password_verify($lozinka, $user['password'])) {
        echo 'Uspjesna prijava!';
    } else {
        echo 'Neuspjesna prijava!';
    }
}





?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <form method="POST">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="first_name"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="last_name"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>

    <form method="GET">
        <label for="identifier">First name:</label><br>
        <input type="text" id="identifier" name="id"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>