<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/form.css">
    <title>Cadastro de usuário</title>


        <script type="text/javascript">
          function previewFoto(event){
            var reader = new FileReader();
            reader.onload = function(){
              var output = document.getElementById('foto');
              output.src = reader.result;
              output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);

          }
        </script>
</head>

<body>
    <h2> Cadastrar novo usuário</h2>
    <div>
        <fieldset>
            <legend>Dados do novo usuário</legend>
            <form method="POST" action="formulario.php" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input size="300" placeholder="Insira seu nome" type="text" id="nome" name="nome"><br>
                <label for="email">Email:</label>
                <input size="300" placeholder="Insira seu email" type="email" id="email" name="email"><br>
               <fieldset>

                <label for="senha">Senha:</label>
                <input size="300" placeholder="Insira a sua senha" type="password" id="senha" name="senha"><br>
               </fieldset>

                <fieldset>
                    <legend>Sexo</legend>
                    <input type="radio" id=   "masc" name="sexo" value="Masculino">
                    <label for="masc">Masculino</label>
                    <input type="radio" id="fem" name="sexo" value="Feminino">
                    <label for="fem">Feminino</label>
                </fieldset><br><br>
                <img id="foto" src="" alt="Foto" width="100"><br>
                <input type="file" id="foto" name="foto" accept="image/png, image/jpeg" onchange="previewFoto(event)"><br><br>
                <br>
                <input type="submit" value="Enviar">
            </form>
            <br>

        </fieldset>
        <br>
        <a href="home.php">Usuários cadastrados</a>
    </div>

</body>

</html>
