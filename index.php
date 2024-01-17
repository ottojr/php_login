<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0){
        echo "Digite um e-mail válido";
    } else if(strlen($_POST['senha']) == 0){
        echo "Digite uma senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $sql   = "SELECT id, nome, email, senha FROM usuarios WHERE email = '$email' and  senha = '$senha'";
        $query = $mysqli->query($sql) or die("Falha na execução do código sql: ". $mysqli-> error);
        $qtde_registro = $query->num_rows;
        if($qtde_registro > 0){
            $usuario = $query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
        } else {
            echo "E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Login de acesso</h1>
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
           <button type="submit">Entrar</button> 
        </p>
    </form>
</body>
</html>