<?php
$alert="";
session_start();
if(!empty($_SESSION['activa'])){
    header('location:index.php');
}else{
    if(!empty($_POST)){
        if(empty($_POST[''])||empty($_POST[''])){
            $alert='<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
   coreeo y contraseña son obligatorios
  </div>';
        }else{
            require_once('Servidor/conexion.php');
            $usuario=mysql_real_escape_string($conexion,$_POST['correo']);
            $pass=mysql_real_escape_string($conexion,$_POST['contra']);
            $query=mysql_query($conexion,"select * from usuarios where correo='$usuario' AND contra='$pass'");
            mysqli_close();
            $resultado=mysqli_num_rows($query);
            if($resultado>0){
                $dato=mysqli_fetch_array($query);
            }
        }
    }else{

    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="padding-top:180px">

        <div class="row" style="background-color: rgb(82,183,136); text-align:center;">
            <div class="col" style="background-color: rgb(116,198,157);">
                <img src="Cliente/img/Logo1.png" height="350px" width="350px">
            </div>
            <div class="col" style="background-color: rgb(183,213,178);">
                <div class="row">
                    <h1>AUTENTIFICACIÓN</h1>
                </div>
                <form style="padding: 15px;" method="POST">
                    <div>
                        <?php echo isset($alert)? $alert:""; ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo">
                        <div id="emailHelp" class="form-text">No olvides colocar tu correo electronico.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="contra">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Validar</label>
                    </div>
                    <button type="submit" class="btn btn-success">Iniciar Sesión</button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>