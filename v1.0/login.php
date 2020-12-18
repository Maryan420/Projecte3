<?php
   include("conexio.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
      $myusername = mysqli_real_escape_string($db,$_POST['DNI']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT nom FROM SOCIS WHERE DNI = '$DNI' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result)
		
      if($count == 1) {
         session_register("DNI");
         $_SESSION['login_user'] = $DNI;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div class="all">
        <div class="fondo">
            <header>
                <h1>GladiGym</h1>
                <img src="img/logo_gym.jpg" alt="Logo">
            </header>
            <form action="login.php" method="post" name="login">
                <div class="llogin">
                    <label for="DNI" class="dni">DNI:</label>
                    <input type="text" name="DNI" id="DNI">
                </div>
                <div class="llogin">
                    <label for="password">Contrasenya:</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="submit" class="benvia" value="Entrar">
            </form>
        </div>
    </div>
</body>

</html>
