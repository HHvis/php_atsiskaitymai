<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prisijungti</title>
        <style>
form {
  border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

        </style>
    </head>
    <body>
        
        <form action="jungtis.php" method="POST">
          <label for="vardas">Iveskite varda:</label><br>
          <input type="text" name="vardas" required><br><br>
          <label for="slaptazodis">Iveskite slaptazodi:</label><br>
          <input type="password" name="slaptazodis" required><br><br>
          <input type="hidden" name="slapukas_2">
          <button type="submit"><a href="vidus.php"></a>Prisijungti</button>
      </form>

    </body>
</html>