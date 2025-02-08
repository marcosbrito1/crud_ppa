<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edição de usuário</title>
    <link rel="stylesheet" type="text/css" href="css/edit.css">

    <script type="text/javascript">
      function previewFoto(event){
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('foto_atual');
          output.src = reader.result;
          output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);

      }
    </script>

</head>

<body>
<?php
include 'banco.php';
include 'UserLoginSession.php';
verificarSessao();

$id_usuario = filter_input(INPUT_GET,'id_usuario',FILTER_SANITIZE_NUMBER_INT);
$result = get_usuario($id_usuario);
$linha = $result[0];
?>

    <h2> Alterar informações do usuário</h2>
    <div>
        <form method="POST" action="editar.php" enctype="multipart/form-data">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="<?php echo $linha['id_usuario'];?>" readonly="true"><br>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $linha['nome'];?>"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $linha['email'];?>"><br>
            <fieldset>
                <legend>Sexo</legend>
                <input type="radio" id="masc" name="sexo"
                <?php
                if($linha['sexo'] === 'Masculino'){
                echo 'checked';
                    }?>
                value="Masculino">
                <label for="masc">Masculino</label><br>
                <input type="radio" id="fem" name="sexo"

                <?php
                if($linha['sexo'] === 'Feminino'){
                echo 'checked';
                    }?>
                value="Feminino">
                <label for="fem">Feminino</label>

            </fieldset><br><br>
            <img id="foto_atual" src="images/<?php echo $linha['foto'];?>" alt="Foto Atual" width="100"><br>

            <input type="file" id="foto" name="foto" accept="image/png, image/jpeg" onchange="previewFoto(event)">
            <br><br>
            <input type="submit" value="Confirma alteração">
        </form>
        <br>
        <a href="home.php">Usuários cadastrados</a>
    </div>

</body>

</html>
