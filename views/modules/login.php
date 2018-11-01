    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">

                    <form class="md-float-material" method="POST">
                        <div class="text-center">
                            <img src="views/assets/images/auth/logo-dark.png" alt="logo.png">
                        </div>
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-left txt-primary">Inicio de Sesión</h3>
                                </div>
                            </div>
                            <hr/>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre_usuario">
                                <span class="md-line"></span>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                <span class="md-line"></span>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="forgot-phone text-right f-right">
                                        <a href="index.php?action=registro" class="text-right f-w-600 text-inverse">No tengo cuenta</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Iniciar Sesión</button>
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
                    <!-- end of form -->

                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->

<?php
    $mvc = new MvcController();
    $mvc->loginController();

    if (isset($_GET['action'])) {
		if ($_GET['action'] == 'fallo') 
			echo 'Error al iniciar sesión';
    }
?>