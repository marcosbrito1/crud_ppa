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

$novo_nome_foto = '';

if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
  $foto_temp = $_FILES['foto']['tmp_name'];
  $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));

  $nome_arquivo = pathinfo($_FILES['foto']['name'], PATHINFO_FILENAME);
  $nome_arquivo_limpo = preg_replace('/[^a-zA-Z0-9-_]//', '_', $nome_arquivo);
  $novo_nome_foto = uniqid() . '_' . $nome_arquivo_limpo . '.' . $extensao;

  $diretorio = __DIR__ . '\images\\';
  $caminho_foto = $diretorio . $novo_nome_foto;

  $fotos_existentes = glob($diretorio . $email . '.*');
  foreach ($fotos_existentes as $foto_antiga) {
    unlink($foto_antiga);
  }

  if(move_uploaded_file($foto_temp, $caminho_foto)){
    echo "Foto enviada com sucesso.<br>";
  }else {
    echo "Erro ao enviar a foto.<br>";
  }

}else{
  echo "Nenhuma foto enviada.<br>";
  if(isset($_FILES['foto']['error'])){
    echo 'Código de erro: '.$FILES['foto']['error'] . '<br>';
  }
}



   include 'banco.php';
   cadastrar_usuario($nome,$email,$sexo,$senha, $novo_nome_foto);
?>
</body>
</html>
