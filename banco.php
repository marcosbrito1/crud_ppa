<?php
include 'config.php';

function cadastrar_usuario($nome, $email, $sexo,$senha)
{
    $conn = conectar();
    $sql = "INSERT INTO  usuario (nome, email, sexo,senha) VALUES (:NOME,:EMAIL,:SEXO,:SENHA)";

    $instrucao = $conn->prepare($sql);

    $instrucao->bindParam(":NOME",$nome);
    $instrucao->bindParam(":EMAIL",$email);
    $instrucao->bindParam(":SEXO",$sexo);
    $instrucao->bindParam(":SENHA",$senha);

    $instrucao->execute();
    header('Location:index.php');
}

function atualizar_usuario($id_usuario, $nome, $email, $sexo)
{
  $conn = conectar();
  $sql = 'UPDATE usuario SET nome = :NOME, email = :EMAIL, sexo = :SEXO
  WHERE id_usuario=:ID_USUARIO';

  $instrucao = $conn->prepare($sql);
  $instrucao->bindParam(":ID_USUARIO",$id_usuario);
  $instrucao->bindParam(":NOME",$nome);
  $instrucao->bindParam(":EMAIL",$email);
  $instrucao->bindParam(":SEXO",$sexo);
  $instrucao->execute();
$retorno = $instrucao->execute();
  if($retorno){
      header('Location:index.php');
  }
  else{
      echo "Erro ao atualizar o usuário de id = ".$id_usuario;
  }
}

function get_usuarios(){
    $conn = conectar();
    $sql = 'SELECT * FROM usuario ORDER BY nome';

    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":ID_USUARIO",$id_usuario);
    $instrucao->execute();

    $result = $instrucao->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_usuario($id_usuario)
{
  $conn = conectar();
  $sql = "SELECT * FROM usuario WHERE id_usuario = :ID_USUARIO";
  $instrucao = $conn->prepare($sql);
  $instrucao->bindParam(":ID_USUARIO",$id_usuario);

  $instrucao->execute();
  $result = $instrucao->fetchALL(PDO::FETCH_ASSOC);
  return $result;
}

function  excluir_usuario($id_usuario){
    $conn = conectar();
    $sql = "DELETE FROM usuario WHERE id_usuario = :ID_USUARIO";
    $instrucao = $conn->prepare($sql);
    $instrucao->bindParam(":ID_USUARIO",$id_usuario);
    $retorno = $instrucao->execute();
    if($retorno){
        header('Location:index.php');
    }
    else{
        echo "Erro ao pagar o usuário de id = ".$id_usuario;
    }
}

?>
