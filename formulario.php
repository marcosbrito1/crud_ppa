<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro</title>
</head>
<body>

   <?php
   echo '<h2>Dados no arquivo formulario.php</h2>';

   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $sexo = $_POST['sexo'];
   $senha = $_POST['senha'];

echo 'Nome: '.$nome.'<br>';
echo 'Email: '.$email.'<br>';
echo 'Sexo: '.$sexo.'<br>';


   include 'banco.php';
   cadastrar_usuario($nome,$email,$sexo,$senha);
?>
</body>
</html>
