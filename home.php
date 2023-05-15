<?php
    session_start();
    include_once("./_php/conection.php");

    $user_id = $_SESSION['user_id'];

    $query = "select * from curriculum where fk_id like $user_id";
    $response = mysqli_query($conection, $query);
    $fk_id = mysqli_fetch_array($response);

    if($fk_id === null){
        $query = "insert into curriculum (fk_id, name, office, email, phone, linkdin) values ('$user_id', '', '', '', '', '')";
        $response = mysqli_query($conection, $query);
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $name = isset($fk_id[1])?$fk_id[1]:null;
    }
    if(isset($_POST['office'])){
        $office = $_POST['office'];
    }else{
        $office = isset($fk_id[2])?$fk_id[2]:null;
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else{
        $email = isset($fk_id[3])?$fk_id[3]:null;
    }
    if(isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }else{
        $phone = isset($fk_id[4])?$fk_id[4]:null;
    }
    if(isset($_POST['linkdin'])){
        $linkdin = $_POST['linkdin'];
    }else{
        $linkdin = isset($fk_id[5])?$fk_id[5]:null;
    }
    
    $action = isset($_POST['action'])?$_POST['action']:null;
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Online - Meu Currículo</title>
    <link rel="stylesheet" type="text/css" href="./_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./_css/home.css">
</head>
<script src="./_js/home.js"></script>
<script>
    <?php
        if($action == "salvar"){
            if($name || $office || $email || $phone || $linkdin){
                $query = "update curriculum set name='$name', office='$office', email='$email', phone='$phone', linkdin='$linkdin' where fk_id=$user_id";
                $response = mysqli_query($conection, $query);
            }
        } else if($action == "deletar"){
            $query = "delete from curriculum where fk_id=$user_id";
            $response = mysqli_query($conection, $query);
            $query = "delete from registered where id=$user_id";
            $response = mysqli_query($conection, $query);
            print "window.location = './index.php';";
        }
    ?>
</script>
<body>
    <div class="card p-5 mt-5 shadow w-75" method="post" action="">
        <header class="d-flex align-content-around mb-5 gap-4">
            <button class="btn btn-outline-primary px-5">
                <h2 class="m-0 p-0"><i class="bi bi-plus-circle"></i></h2>
            </button>
            <div>
                <div>
                    <div id="estado1-nome-completo" class="d-flex flex-nowrap">
                        <h1 id="nome-completo"><?php 
                            if($name){
                                print "$name";
                            }else{
                                print "Nome Completo";
                                }
                            ?></h1>
                        <button id="button-nome-completo" class="buttonicon" onclick="editar_label('nome-completo')"><h1><i class="bi bi-pencil-square ms-1"></i></h1></input>
                    </div>
                    <div id="estado2-nome-completo" class="d-none gap-1 flex-nowrap">
                        <input id="input-nome-completo" class="form-control" />
                        <button id="salvar-nome-completo" class="btn btn-success btn-lg" onclick="editar_label('nome-completo', 'save')" ><i class="bi bi-check-circle"></i></button>
                        <button id="cancelar-nome-completo" class="btn btn-outline-danger btn-lg" onclick="editar_label('nome-completo', 'cancel')" ><i class="bi bi-x-circle"></i></button>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div id="estado1-cargo" class="d-flex align-items-start flex-nowrap">
                        <h6 id="cargo"><?php
                                if($office){
                                    print "$office";
                                }else{
                                    print "Cargo";
                                }?></h6>
                        <button id="button-cargo" class="buttonicon" onclick="editar_label('cargo')"><i class="bi bi-pencil-square ms-1"></i></button>
                    </div>
                    <div id="estado2-cargo" class="d-none gap-1 flex-nowrap">
                        <input id="input-cargo" class="form-control" />
                        <button id="salvar-cargo" class="btn btn-success btn-lg" onclick="editar_label('cargo', 'save')" ><i class="bi bi-check-circle"></i></button>
                        <button id="cancelar-cargo" class="btn btn-outline-danger btn-lg" onclick="editar_label('cargo', 'cancel')" ><i class="bi bi-x-circle"></i></button>
                    </div>
                    <br>
                </div>

                <div class="d-flex align-items-start">
                    <div id="estado1-email" class="d-flex align-items-start flex-nowrap">
                        <h6 id="email"><?php
                                if($email){
                                    print "$email";
                                }else{
                                    print "E-mail";
                                }
                            ?></h6>
                        <button id="button-email" class="buttonicon" onclick="editar_label('email')"><i class="bi bi-pencil-square ms-1"></i></button>
                    </div>
                    <div id="estado2-email" class="d-none gap-1 flex-nowrap">
                        <input id="input-email" class="form-control" />
                        <button id="salvar-email" class="btn btn-success btn-lg" onclick="editar_label('email', 'save')" ><i class="bi bi-check-circle"></i></button>
                        <button id="cancelar-email" class="btn btn-outline-danger btn-lg" onclick="editar_label('email', 'cancel')" ><i class="bi bi-x-circle"></i></button>
                    </div>
                    <br>
                </div>

                <div class="d-flex align-items-start">
                    <div id="estado1-telefone" class="d-flex align-items-start flex-nowrap">
                        <h6 id="telefone"><?php
                                if($phone){
                                    print "$phone";
                                }else{
                                    print "Telefone";
                                }
                            ?></h6>
                        <button id="button-telefone" class="buttonicon" onclick="editar_label('telefone')"><i class="bi bi-pencil-square ms-1"></i></button>
                    </div>
                    <div id="estado2-telefone" class="d-none gap-1 flex-nowrap">
                        <input id="input-telefone" class="form-control" />
                        <button id="salvar-telefone" class="btn btn-success btn-lg" onclick="editar_label('telefone', 'save')" ><i class="bi bi-check-circle"></i></button>
                        <button id="cancelar-telefone" class="btn btn-outline-danger btn-lg" onclick="editar_label('telefone', 'cancel')" ><i class="bi bi-x-circle"></i></button>
                    </div>
                    <br>
                </div>

                <div class="d-flex align-items-start">
                    <div id="estado1-linkdIn" class="d-flex align-items-start flex-nowrap">
                        <h6 id="linkdIn"><?php
                                if($linkdin){
                                    print "$linkdin";
                                }else{
                                    print "LinkdIn";
                                }
                            ?></h6>
                        <button id="button-linkdIn" class="buttonicon" onclick="editar_label('linkdIn')"><i class="bi bi-pencil-square ms-1"></i></button>
                    </div>
                    <div id="estado2-linkdIn" class="d-none gap-1 flex-nowrap">
                        <input id="input-linkdIn" class="form-control" />
                        <button id="salvar-linkdIn" class="btn btn-success btn-lg" onclick="editar_label('linkdIn', 'save')" ><i class="bi bi-check-circle"></i></button>
                        <button id="cancelar-linkdIn" class="btn btn-outline-danger btn-lg" onclick="editar_label('linkdIn', 'cancel')" ><i class="bi bi-x-circle"></i></button>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="row row-cols-2">
            <div class="mb-5">
                <h3>Objetivo</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>
            
            <div class="mb-5">
                <h3>Experiência</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>

            <div class="mb-5">
                <h3>Cursos e Certificados</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>

            <div class="mb-5">
                <h3>Competências</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>

            <div class="mb-5">
                <h3>Habilidades Interpessoais</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>

            <div class="mb-5">
                <h3>Idiomas</h3>
                <button class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i>
                    Adicionar
                </button>
            </div>
        </div>

        <div class="d-flex gap-3 justify-content-between">
            <button class="btn btn-outline-danger" onclick="mensagem_modal('deletar')" data-bs-toggle="modal" data-bs-target="#confirm-modal">
                <i class="bi bi-trash3"></i>
                Deletar Conta
            </button>
                
            <button class="btn btn-success" onclick="mensagem_modal('salvar')" data-bs-toggle="modal" data-bs-target="#confirm-modal">
                <i class="bi bi-check-circle"></i>
                Salvar Alterações
            </button>
        </div>
    </div>

    <footer class="text-end mt-4 mb-2">
        Desenvolvido por Maycon Lima. ©2023
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="confirm-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Atenção</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div id="modal-body" class="modal-body"></div>

        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form method="post" action="">
                <?php
                    print "<input id='form-nome-completo' name='name' value='$name' hidden/>";
                    print "<input id='form-cargo' name='office' value='$office' hidden/>";
                    print "<input id='form-email' name='email' value='$email' hidden/>";
                    print "<input id='form-telefone' name='phone' value='$phone' hidden/>";
                    print "<input id='form-linkdIn' name='linkdin' value='$linkdin' hidden/>";
                    print "<input id='form-action' name='action' hidden/>";
                ?>
                <button id="modal-button-submit" class="btn" type="submit" data-bs-toggle="modal" data-bs-target="#confirm-modal"></button>
            </form>
        </div>
        </div>
    </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>