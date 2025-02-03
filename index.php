<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body id="bodyLogin">
    <div class="login">
      <form action="login.php" method="post">
      <input type="text" placeholder="Nome" name="nome" autocomplete="off" value="<?php echo isset($_COOKIE['usernameppa']) ? $_COOKIE['usernameppa'] : ''; ?>">
        <input type="password" placeholder="Senha" name="senha"><br><br>
        <input type="submit" value="Login"><br><br>
        <input type="reset" value="cancelar">
      </form>
    </div>
  </body>
</html>
