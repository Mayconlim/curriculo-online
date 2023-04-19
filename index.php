<?php

include_once("./_php/conection.php");

$email = isset($_POST['email'])?$_POST['email']:"";
$senha = isset($_POST['password'])?$_POST['password']:"";

$query = "select * from registered where email like '%$email%'";
$response = mysqli_query($conection, $query);

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
<script src="./_js/login.js"></script>
<script>
    <?php
        $error = false;
		if($email != "" || $senha != ""){
			$user = mysqli_fetch_array($response);
			if($email == $user[2] && $senha == $user[3]){
				print "window.location = './home.html';";
			}else{
                $error = true;
			}
		}
	?>
</script>
<body>
    <form class="card p-5 w-25 shadow" method="post" action="">
        <div class="row g-1 align-items-center justify-content-center">
            <h1 class="text-center mb-4">Bem-vindo</h1>

            <div class="alert alert-danger p-2 text-center" role="alert" 
            <?php
                if($error === true){
                    print "style='display: '';'";
                }else{
                    print "style='display: none;'";
                }
            ?>
            >
                <i class="bi bi-exclamation-circle"></i>
                E-mail ou senha incorretos.
            </div>
        
            <div>
                <label class="form-label" for="email">E-mail</label>
                <input id="email" type="email" name="email"
                <?php
                    if($error === true){
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
                    if($error === true){
                        print "class='form-control is-invalid'";
                    }else{
                        print "class='form-control'";
                    }
                ?>
                />
            </div>
            <input class="btn btn-primary mt-5 w-50" type="submit" value="Entrar"/>
        </div>
    </form>
    <script src="./_bootstrap/js/bootstrap.min.js"></script>
</body>
</html>