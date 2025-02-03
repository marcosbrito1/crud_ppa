<?php
include 'UserLoginSession.php';
verificarSessao();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Página Inicial</title>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
</head>

<body>
        <h2>Usuários Cadastrados</h2>
        <div>
    <?php
          echo '<table>';
               echo '<tr>';
                    echo'<th>Código</th>';
                    echo'<th>Nome</th>';
                    echo'<th>Sexo</th>';
                    echo'<th>E-mail</th>';
                    echo "<th colspan='2' style='text-align: center'>Ações</th>";
                echo'</tr>';
                include 'banco.php';
                $result = get_usuarios();
                foreach ($result as $linha){
                echo'<tr>';
                    echo '<td>'.$linha["id_usuario"].'</td>';
                    echo'<td>'.$linha["nome"].'</td>';
                    echo'<td>'.$linha["sexo"].'</td>';
                    echo'<td>'.$linha["email"].'</td>';
                    $id = $linha["id_usuario"];

                    echo'<td><a class="btnExcluir" href="excluir_usuario.php?id_usuario='.$id.'">Excluir</a></td>';
                    echo'<td><a class="btnEditar" href="editar_usuarios.php?id_usuario='.$id.'">Editar</a></td>';

                echo'</tr>';
                }
            echo'</table>';
?>
            <a class="linkNovo" href="forms.php">Novo Usuário</a>
            <a class = "linkNovo" href="logout.php">Sair</a>
        </div>
    </body>
</html>
