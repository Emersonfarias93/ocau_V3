<?php

session_start();

include('conn.php');

if(isset($_POST['email']) || isset($_POST['password'])) {

    if(strlen($_POST['email']) == 0){
        echo "preencha seu e-mail";
    } else if(strlen($_POST['password']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM tb_usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;
        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: /ocau_V3/views/lista_email.php");

 
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }
}

?>