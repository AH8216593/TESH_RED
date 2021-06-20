<?php
include_once URL_APP . '/views/custom/header.php';
?>

<header class="header">
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo URL_PROJECT?>/rdtesh/index.html">
        <img src="<?php echo URL_PROJECT?>/img/favicon.png">   RDTESH</a>
      </button>
    </nav>
</header>
<div class="container-center center">
    <div class="container-content center">
        <div class="content-action center">
            <h4>Registrarme</h4>
            <form action="<?php echo URL_PROJECT?>/home/register" method="POST">
                <input type="email" name="email" placeholder="Email" pattern="[a-zA-Z0-9_]+@[huixquilucan]+([.][tecnm]+)[.][mx]{1,5}" required >
                <input type="text" name="usuario" placeholder="Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <button class="btn-green btn-block">Registrarme</button>
            </form>
            <?php  if (isset($_SESSION['usuarioError'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['usuarioError'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php unset($_SESSION['usuarioError']);
            endif ?>
            <div class="contenido-link mt-2">
                <span class="mr-2">¿Ya tienes una cuenta?</span><a href="<?php echo URL_PROJECT ?>/home/login">Ingresar</a>
            </div>
        </div>
        <div class="content-image center">
            <video width="550" height="300" src="<?php echo URL_PROJECT?>/public/img/univ.mp4" autoplay muted loop >
        </div>
    </div>
</div>

<?php

include_once URL_APP . '/views/custom/footer.php';

?>