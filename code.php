<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_pablo']))
{
    $pablo_id = mysqli_real_escape_string($con, $_POST['delete_pablo']);

    $query = "DELETE FROM usuarios WHERE id='$pablo_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Apagado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não excluído";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_pablo']))
{
    $pablo_id = mysqli_real_escape_string($con, $_POST['pablo_id']);

    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
   

    $query = "UPDATE usuarios SET nome='$nome', email='$email', cpf='$cpf'  WHERE id='$pablo_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Atualizado com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não atualizado";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_pablo']))
{
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
    

    $query = "INSERT INTO usuarios (nome,email,cpf) VALUES ('$nome','$email','$cpf')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Criado com sucesso";
        header("Location: pablo-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não criado";
        header("Location: pablo-create.php");
        exit(0);
    }
}

?>