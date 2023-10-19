<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['placa']))
    {
        // Acessa
        include_once('config.php');
        $email = $_POST['email'];
        $placa = $_POST['placa'];

        

     
$sql = " SELECT * FROM cliente WHERE email = '$email'";


        $result = $conexao->query($sql);
        if (!$result) {
            die('Erro na consulta SQL: ' . mysqli_error($conexao));
        }

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['placa']);
            echo '<script>
            alert("Conta de usuário não identificada, realize o cadastro 🚨 ");
            window.location.href = "login.html";
        </script>';
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['placa'] = $placa;
            header('Location: dados-cliente.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: home.html');
    }
?>

<script>
    alert("mensagem aqui");
</script>