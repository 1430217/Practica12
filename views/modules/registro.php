<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-user bg-c-lite-green"></i>
                <div class="d-inline">
                    <h4>Registrar usuario</h4>
                    <span>En esta sección podrá registrar usuarios en el sistema.</span><br><br>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="md-float-material" method="POST" enctype="multipart/form-data">
    <div class="auth-box">
        <div class="row m-b-20">
            <div class="col-md-12">
                <h3 class="text-center txt-primary">Formulario de registro</h3>
            </div>
        </div>
        <hr/>
        
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
            <span class="md-line"></span>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
            <span class="md-line"></span>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre_usuario">
            <span class="md-line"></span>
        </div>

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Correo Electronico" name="correo">
            <span class="md-line"></span>
        </div>

        <div class="input-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <span class="md-line"></span>
        </div>

        <div class="input-group">
            <input type="hidden" class="form-control" placeholder="Contraseña" name="fecha">
            <span class="md-line"></span>
        </div>
        
        <div class="input-group">
            <input type="file" class="form-control" placeholder="Imagen de perfil" name="imagenPerfil" id="imagenPerfil">
            <span class="md-line"></span>
        </div>

        <div class="row m-t-30">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Registrarse</button>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-10">
                <p class="text-inverse text-left m-b-0">TAW 2018</p>
                <p class="text-inverse text-left"><b>Sistema de Inventario</b></p>
            </div>
            <div class="col-md-2">
                <img src="views/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
            </div>
        </div>
    </div>
</form>
<!-- < ?php
    echo $_POST['nombre'];
    echo $_POST['apellido'];
    echo $_POST['nombre_usuario'];
    echo $_POST['correo'];
    echo $_POST['password'];
    echo $_POST['fecha'];
    echo $_POST['imagenPerfil'];
?> -->

<?php
    $registro = new MvcController();
    $res = $registro->addUsuarioController();
    
    if($res === 'success')
        echo 'Registro Exitoso';
?>