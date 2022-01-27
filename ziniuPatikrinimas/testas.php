<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testas</title>
        <style>
            label {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 20px;
            }
            a {
                color: blue;
                text-decoration:none;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
                    <h3 align="center">
                        <a href="vidus.php">GRIZTI ATGAL I PARDUOTUVE</a></h3>
        
        <h2 style="text-align: left;">TESTAS PARDUOTUVES KOKYBEI IVERTINTI</h2><br>
    <form action="rezultatas.php" method="POST" style="text-align: left;">
        <label for="puslapis1">Kaip vertinate el. parduotuve?</label><br>
    <select id='1' name="1">
       <option value="">---Pasirinkite---</option>
       <option value="5">Labai gerai</option>
       <option value="4">Gerai</option>
       <option value="3">Vidutiniskai</option>
       <option value="2">Blogai</option>
       <option value="1">Labai blogai</option>
    </select> <br>
        <label for="puslapis2">Kaip vertinate prekes?</label><br>
    <select id='2' name="2">
       <option value="">---Pasirinkite---</option>
       <option value="5">Labai gerai</option>
       <option value="4">Gerai</option>
       <option value="3">Vidutiniskai</option>
       <option value="2">Blogai</option>
       <option value="1">Labai blogai</option>
    </select> <br>
        <label for="puslapis3">Kaip vertinate puslapi?</label><br>
    <select  id='3' name="3">
       <option value="">---Pasirinkite---</option>
       <option value="5">Labai gerai</option>
       <option value="4">Gerai</option>
       <option value="3">Vidutiniskai</option>
       <option value="2">Blogai</option>
       <option value="1">Labai blogai</option>
    </select> <br>
        <label for="puslapis4">Kaip vertinate klausimus?</label><br>
    <select id='4' name="4">
       <option value="">---Pasirinkite---</option>
       <option value="5">Labai gerai</option>
       <option value="4">Gerai</option>
       <option value="3">Vidutiniskai</option>
       <option value="2">Blogai</option>
       <option value="1">Labai blogai</option>
    </select> <br>
        <label for="puslapis5">Kaip vertinate kainas?</label><br>
    <select id='5' name="5">
       <option value="">---Pasirinkite---</option>
       <option value="5">Labai gerai</option>
       <option value="4">Gerai</option>
       <option value="3">Vidutiniskai</option>
       <option value="2">Blogai</option>
       <option value="1">Labai blogai</option>
    </select> <br>
    <input type="submit" id='go' name="submit" value="Pateikti"> 

    </body>
</html>