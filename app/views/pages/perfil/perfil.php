<?php 
include_once URL_APP . '/views/custom/header.php';

include_once URL_APP . '/views/custom/navbar.php';

?>

<div class="perfil-container-usuario">
<div class="imagen-header-perfil-usuario">
<img src="<?php echo URL_PROJECT ?>/<?php echo $datos['perfil']->fotoPortada ?>" class="imagen-portada-perfil" alt="">
</div>
<div class="container-header-usuario">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="datos-perfil-usuario">
                    <img src="<?php echo URL_PROJECT ?>/<?php echo $datos['perfil']->fotoPerfil ?>" class="imagen-perfil-usuario" alt="">
                    <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                        <div class="imagen-perfil-cambiar">
                            <form action="<?php echo URL_PROJECT ?>/perfil/cambiarImagen" method="POST" enctype="multipart/form-data">
                                <i class="fas fa-camera-retro"></i>
                                <div class="input-file">
                                 <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?> ">
                                    <input type="file" name="imagen" id="imagen" required>
                                </div>
                            </div>
                            <div class="editar-perfil">
                                <button class="btn-change-image">Editar</button>
                            </div>
                        </form>
                                               <div class="imagen-perfil-cambiar-portada">
                       <form action="<?php echo URL_PROJECT ?>/perfil/cambiarImagenPortada" method="POST" enctype="multipart/form-data">
                        <i class="fas fa-camera-retro"></i>
                        <div class="input-file">
                          <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado']?> ">
                          <input type="file" name="imagen" id="imagen" required>
                      </div>
                  </div>
                  <div class="editar-perfil-portada">
                     <button class="btn-change-image">Actualizar Portada</button>
                 </div>
             </form>    
                    <?php endif ?>
                    <div class="datos-personales-usuario">
                        <h3><?php echo ucwords($datos['usuario']->usuario) ?></h3>
                        <div class="descripcion-usuario">
                            <span><?php echo $datos['perfil']->nombreCompleto ?></span>
                        </div>
                        </div>    
                </div>
                                 <div class="container-usuario-contact">
         <a href="<?php echo URL_PROJECT ?>/mensajes" class="btn-message"><span class="big"><i class="far fa-envelope"></i></span> Mensaje</a>
     </div>
            </div>


    <div class="col-md-6">
        <div class="container-principal-informacion-usuario">
            <div class="container-style-main">
              <?php if ($datos['usuario']->idusuario == $_SESSION['logueado']) : ?>
                <div class="container-usuario-publicar">
                 <a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datos['usuario']->usuario ?>"><img src="<?php echo URL_PROJECT . '/' . $datos['perfil']->fotoPerfil ?>" class="image-border " alt=""></a>
            <form action="<?php echo URL_PROJECT ?>/publicacionesperfil/publicarperfil/<?php echo $datos['usuario']->idusuario ?>" method="POST" enctype="multipart/form-data" class="form-publicar ml-2">
                    <textarea name="contenido" id="contenido" class="published mb-0" name="post" placeholder="¿Qué estas pensando?" required></textarea>
                                    <div class="image-upload-file">
                                        <div class="upload-photo">
                                            <img src="<?php echo URL_PROJECT ?>/img/image.png" alt="" class="image-public">
                                            <div class="input-file">
                                                <input type="file" name="imagen" id="imagen">
                                            </div>
                                            <span class="ml-1">Subir foto</span>
                                        </div>
                                        <button class="btn-publi">Publicar</button>
                                    </div>

                                </form>
                            </div>
                            <?php endif ?>

                              <?php foreach ($datos['publicacionesperfil'] as $datosPublicacionPerfil) : ?>
                                <?php if ($datosPublicacionPerfil->idusuario == $_SESSION['logueado']) : ?>
                <div class="container-usuarios-publicaciones">
                    <div class="usuarios-publicaciones-top">
                        <img src="<?php echo URL_PROJECT . '/' . $datosPublicacionPerfil->fotoPerfil ?>" alt="" class="image-border ">
                        <div class="informacion-usuario-publico">
                            <h6 class="mb-0"><a href="<?php echo URL_PROJECT ?>/perfil/<?php echo $datosPublicacionPerfil->usuario ?>"><?php echo ucwords($datosPublicacionPerfil->usuario) ?></a></h6>
                            <span><?php echo $datosPublicacionPerfil->fechaPublicacionPerfil ?></span>
                        </div>
                        <?php if ($datosPublicacionPerfil->idusuario == $_SESSION['logueado']) : ?>
                            <div class="eli"> 
                                <a href="<?php echo URL_PROJECT?>/publicacionesperfil/eliminar/<?php echo $datosPublicacionPerfil->idpublicacionperfil?>"><i class="fas fa-trash"></i></a>
                            </div>
                        <?php endif ?>
                    </div>
                    <?php endif ?>
<?php if ($datosPublicacionPerfil->idusuario == $_SESSION['logueado']) : ?>
                    <div class="contenido-publicacion-usuario">
                        <p class="mb-1"><?php echo $datosPublicacionPerfil->contenidoPublicacionPerfil ?></p>
                        <img src="<?php echo URL_PROJECT . '/' . $datosPublicacionPerfil->fotoPublicacionPerfil ?>" alt="" class="imagen-publicacion-usuario">
                    </div>
                                                    <?php endif ?>
<?php if ($datosPublicacionPerfil->idusuario == $_SESSION['logueado']) : ?>
                    <div class="caja">
                       <a title="Descargar Archivo " href="<?php echo URL_PROJECT . '/' . $datosPublicacionPerfil->fotoPublicacionPerfil ?>" download="<?php $datosPublicacionPerfil->contenidoPublicacionPerfil?>"> 
                        <img  src="<?php echo URL_PROJECT ?>/img/down.png" height="40px">
                        <span class="glyphicon glyphicon-download-alt"></span></a>
                    </div>
                     <?php endif ?>
                    <hr>
                    </div>
                <?php endforeach ?>
                    </div>

            </div>
        </div>
            <div class="col-md-2">
 </div>
</div>
</div>
</div>
</div>

<?php

include_once URL_APP . '/views/custom/footer.php';

?>