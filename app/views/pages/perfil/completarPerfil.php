<?php
include_once URL_APP . '/views/custom/header.php';

?>

<div class="completarPerfil">
    <div class="container">
        <div class="container-perfil">
            <h2 class="animate__animated animate__bounce animate__repeat-3">¡Ya casi terminamos!</h2>
            <h6 class="animate__animated animate__bounce animate__delay-2s" style=fantasy>* Antes de continuar deberas completar tu perfil</h6>
            <hr>
            <div class="content-completar-perfil center">
                <form action="<?php echo URL_PROJECT ?>/home/insertarRegistrosPerfil" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['logueado'] ?>">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="imagen" id="imagen" required>
                            <label class="custom-file-label" for="imagen">Seleccionar una foto</label>
                        </div>
                    </div>
                    <button class="btn-green btn-block">Registrar datos</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include_once URL_APP . '/views/custom/footer.php';
?>