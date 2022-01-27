<?php

  $link = mysqli_connect("localhost", "root", "", "ziniuPatikrinimas");
    
  if (mysqli_errno($link)) {
  echo mysqli_error($link);
  exit;
  }


if (isset ($_POST["slapukas_2"])){
    $vardas = $_POST["vardas"];
    $slaptazodis = $_POST["slaptazodis"];
    
    $sql = "SELECT vardas, slaptazodis FROM vartotojai "
            . "WHERE vardas LIKE '$vardas' AND slaptazodis LIKE '$slaptazodis'";
    $result = mysqli_query($link, $sql);
    
    
    
    if(mysqli_num_rows($result) == 1){
    setcookie("vardas", $vardas, time() + 3600 * 4);
    header("Location: vidus.php");
    }
    
    if(mysqli_num_rows($result) == 0){
    echo "<h1>Blogi prisijungimo duomenys</h1>";
    } 
}