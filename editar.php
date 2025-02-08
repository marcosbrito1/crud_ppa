<?php
$id_usuario = $_POST['codigo'];
$nome = $_POST['nome'];
   $email = $_POST['email'];
   $sexo = $_POST['sexo'];


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

   atualizar_usuario($id_usuario, $nome, $email, $sexo, $novo_nome_foto);
   ?>
