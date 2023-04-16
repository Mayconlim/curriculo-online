<?php

include_once("./_php/conection.php");

$email = isset($_POST['email'])?$_POST['email']:"";
$senha = isset($_POST['senha'])?$_POST['senha']:"";

$query = "select * from registered where email like '%$email%'";
$response = mysqli_query($conection, $query);

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Online - Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./_css/styles.css">
</head>
<script>
    <?php
		if($email != ""){
			$user = mysqli_fetch_array($response);
			if($email == $user[2] && $senha == $user[3]){
				print "window.location = './home.html';";
			}else{
                print "logar();";
			}
		}
	?>
</script>
<body>
    <form class="card p-5 w-25 shadow" method="post" action="">
        <div class="row g-1 align-items-center justify-content-center">
            <h1 class="text-center mb-4">Bem-vindo</h1>

            <div class="alert alert-danger p-2 text-center" role="alert" style="display: none;">
                <i class="bi bi-exclamation-circle"></i>
                E-mail ou senha incorretos.
            </div>
        
            <div>
                <label class="form-label" for="email">E-mail</label>
                <input id="email" class="form-control" type="email" name="email"/>
            </div>

            <div>
                <label class="form-label" for="senha">Senha</label>
                <input id="senha" class="form-control" type="password" name="senha"/>
            </div>
            <input class="btn btn-primary mt-5 w-50" type="submit" value="Entrar"/>
            <!-- <button class="btn btn-primary mt-5 w-50" onclick="logar()">Entrar</button> -->
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="./_js/login.js"></script>
</body>
</html>