<?php

session_start();

if (!isset($_SESSION['genNum'])) { // Generujemy liczbę jeżeli nie jest wcześniej ustawiona

  $_SESSION['genNum'] = rand(1, 10);

}

if (isset($_POST['generateNew'])) { // Generujemy nową liczbę, gdy naciśniemy przycisk "Generate New Number"
  session_unset();
  header('Location: games.php');
}


if (isset($_POST['checkNumber'])) { // Sprawdzamy czy wylosowana liczba zgadza się z podaną przez użytkownika

  $selectNumber = $_POST['selectNumber'];

  $generateNum = $_SESSION['genNum'];

  if (preg_match ('/^-?[0-9]+$/', $selectNumber)) { // Sprawdzanie czy podana wartośc to liczba
    if ($selectNumber>$generateNum) {
      $question = "Your number is too big";
    }
    elseif ($selectNumber<$generateNum) {
      $question = "Your number is too small";
    }
    else {
      $question = "<a style='color: green;'>Congratulations!</a> Generated number is: " . $generateNum;
    }
  }
  else {
    $question = "Write correct number between 1-10";
  }



}







?>
<DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" />
  <title>Games</title>


</head>
<body>

<p>
  #1 Game - What number is in my mind? Between 1-10
</p>

<form method="post" action="#">

  <input type="text" name="selectNumber" placeholder="Write your number"/>

  <input type="submit" name="checkNumber" value="Check number" />

  <input type="submit" name="generateNew" value="Generate New number" />

</form>

<div id="number" style="font-size: 20px; "><br /></div>

<script>

document.getElementById('number').innerHTML = "<?= $question ?>"

</script>


<style>

body {
  background: #ccc ;
}

</style>



</body>
</html>
