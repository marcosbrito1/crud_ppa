<?php
   include 'banco.php';
   $id_usuario = filter_input(INPUT_GET,'id_usuario',FILTER_SANITIZE_NUMBER_INT);
   excluir_usuario($id_usuario);
   ?>
