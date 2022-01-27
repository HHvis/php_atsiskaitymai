<?php


if (isset($_POST["submit"])) {
    $avgRezultatas = array_sum($_POST)/5;
    $link=mysqli_connect("localhost","root","","ziniupatikrinimas");
    $sql="INSERT INTO vertinimas VALUES('".$_COOKIE["vardas"]."','".$avgRezultatas."')";
mysqli_query($link, $sql);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Rezultatai</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
   <h4 align="left" style="padding-top: 2em;"><?php echo "Testo vidurkis = " . $avgRezultatas; ?></h4>
   <p align="left">Aciu uz ivertinima!</p>
   <h2 align="center"><a href="vidus.php">Atgal I Parduotuve ></a></h2>

    </body>
</html>