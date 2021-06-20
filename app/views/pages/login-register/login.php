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
			<h4>Iniciar Sesión</h4>
			<form action="<?php echo URL_PROJECT ?>/home/login" method="POST">
				<input type="text" name="usuario" placeholder="Usuario" required>
				<input type="password" name="contrasena" placeholder="Contraseña" required>
				<button class="btn-green btn-block">Ingresar</button>
			</form> 
            <!-- Esta es la alerta cuando el usuario o la contraseña son incorrectos -->
			 <?php if (isset($_SESSION['errorLogin'])) : ?>
                <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['errorLogin'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['errorLogin']);
            endif ?>

            <!-- Esta es la alerta cuanto el registro se completo -->
            <?php if (isset($_SESSION['loginComplete'])) : ?>
                <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                    <?php echo $_SESSION['loginComplete'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['loginComplete']);
            endif ?>

            <div class="contenido-link mt-2">
                <span class="mr-2">¿No tienes una cuenta?</span><a href="<?php echo URL_PROJECT?>/home/register">Registrarme</a>
            </div>
        </div>
        <div class="content-image center">
            <video class="about-us text-center wow fadeInDown" width="520" height="300" autoplay controls muted loop id="myVideo">
                <source src="<?php echo URL_PROJECT?>/public/img/uni.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<?php 

include_once URL_APP . '/views/custom/footer.php';

?>