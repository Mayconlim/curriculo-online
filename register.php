<?php

include_once("./_php/conection.php");

$name = isset($_POST['name'])?$_POST['name']:"";
$email = isset($_POST['email'])?$_POST['email']:"";
$senha = isset($_POST['password'])?$_POST['password']:"";

$query = "select * from registered where email like '%$email%'";
$response = mysqli_query($conection, $query);

$error = false;

if($name != "" || $senha != "" || $email != ""){
    if($name == "" || $senha == "" || $email == ""){
        $error .= "Preencha todos os campos.\n";   
    }

    if($email != ""){
        $user = mysqli_fetch_array($response);
        if($user){
            $error .= "Esse e-mail já foi cadastrado.\n"; 
        }
    }

    if($error === false){
        $query = "insert into registered (name, email, password) values ('$name', '$email', '$senha')";
        $response = mysqli_query($conection, $query);
    }
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Online - Entrar</title>
    <link rel="stylesheet" type="text/css" href="./_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./_css/styles.css">
</head>
<script>
    <?php
        if($response == 1){
            print "window.location = './index.php';";
        }
    ?>
</script>
<body>
    <form class="card p-5 w-25 shadow" method="post" action="">
        <div class="row g-1 align-items-center justify-content-center">
            <h1 class="text-center mb-4">Cadastre-se</h1>

            <div class="alert alert-danger p-2 text-center" role="alert" 
            <?php
                if($error == true){
                    print "style='display: '';'";
                }else{
                    print "style='display: none;'";
                }
            ?>
            >
                <i class="bi bi-exclamation-circle"></i>
                <?php
                    print "$error";
                ?>  
            </div>
        
            <div>
                <label class="form-label" for="name">Nome</label>
                <input id="name" type="name" name="name"
                <?php
                    if($error == true){
                        print "class='form-control is-invalid'";
                    }else{
                        print "class='form-control'";
                    }
                    print "value='$name'";
                ?>
                />
            </div>

            <div>
                <label class="form-label" for="email">E-mail</label>
                <input id="email" type="email" name="email"
                <?php
                    if($error == true){
                        print "class='form-control is-invalid'";
                    }else{
                        print "class='form-control'";
                    }
                    print "value='$email'";
                ?>
                />
            </div>

            <div>
                <label class="form-label" for="password">Senha</label>
                <input id="password" type="password" name="password"
                <?php
                    if($error == true){
                        print "class='form-control is-invalid'";
                    }else{
                        print "class='form-control'";
                    }
                ?>
                />
            </div>
            <div class="container text-center mt-5 row">
                <a class="col btn btn-outline-secondary me-1" href="./index.php">Voltar</a>
                <input class="col btn btn-primary ms-1" type="submit" value="Cadastrar"/>
            </div>
        </div>
    </form>
    <script src="./_bootstrap/js/bootstrap.min.js"></script>
</body>
</html>