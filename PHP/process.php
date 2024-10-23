<?php
   
    // Configurações de conexão
    $servername = "localhost";
    $username = "root";  // Nome de usuário do banco de dados (ajuste conforme o servidor)
    $password = "";      // Senha do banco (ajuste conforme o servidor)
    $dbname = "ionic_app";
    
    // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    
    // Receber os dados do formulário
    $email = $_POST['email'];
    $password = $_POST['password'];
    $apelido =$_POST ['apelido'];
    
    // Verificar se os campos estão preenchidos
    if (empty($email) || empty($password) || empty($apelido)) {
        echo "Por favor, preencha todos os campos!";
        exit();
    }
    
    // Inserir dados no banco
    $sql = "INSERT INTO usuario (apelido,email,password) VALUES ('$apelido','$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // Redirecionar após o sucesso
        header("Location: /pagina-inicial.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    ?>
    